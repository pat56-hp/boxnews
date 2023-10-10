<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Post;

class IndexController extends Controller
{

    public function home()
    {
        if (Post::count() < 1) {
            return view('errors.starting');
        }


        $categorie['actualite'] = Category::where('id', '6')->first();
        $categorie['economie'] = Category::where('id', '7')->first();
        $categorie['culture'] = Category::where('id', '8')->first();
        $categorie['video'] = Category::where('id', '9')->first();
        $categorie['subCategories'] = Category::byActive()->bySub()->get();
        $categorie['sport'] = $categorie['subCategories']->where('name', 'Sport')->first();
        $categorie['sante'] = $categorie['subCategories']->where('name', 'Santé')->first();
        $categorie['subCategCulture'] = Category::byActive()->where('parent_id', $categorie['culture']->id)->get();

        /*$data['latestNews'] = Post::whereHas('categories', function ($q) use ($categorie){
            $q->where('category_id', $categorie['actualite']->id);
        })->where(['approve' => 'yes'])->orderByDesc('id')->get()->take('10');*/

        $data['latestNews'] = Post::byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(10);

        $data['laUnes'] = Post::forHome()->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(6);

        $data['actuOfWeeks'] = Post::byCategory($categorie['actualite']->id)->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(10);

        $data['firstEconomie'] = Post::byCategory($categorie['economie']->id)->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->first();

        $data['economies'] = Post::byCategory($categorie['economie']->id)->byPublished()->byLanguage()->byApproved()->where('id', '!=', $data['firstEconomie']->id)->orderByDesc('id')->get()->take(9);

        $data['sports'] = Post::byCategory($categorie['sport']->id)->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(5);

        $data['videos'] = Post::byCategory($categorie['video']->id)->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(3);

        $data['populars'] = Post::inRandomOrder()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(4);

        ################## CULTURE #################
        $data['cultures'] = Post::byCategory($categorie['actualite']->id)->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(4);
        $data['subCategCulture'] = $categorie['subCategCulture'];

        ################## END CULTURE #################

        $data['santes'] = Post::byCategory($categorie['sante']->id)->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(10);
        $data['menu'] = 'accueil';
        $data['page_title'] = 'Accueil';

        return view(
            'frontend.index',
            $data
        );
    }

    public function categories(Request $request)
    {
        $category = Category::with(['children', 'allChildrens'])->where("name_slug", $request->categ)->firstOrFail();
        $subCategories = $category->allChildrens()->get();

        //Post en avant
        $data['postTops'] = Post::byCategories($category->id)->forHome()->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(2);
        $posts = Post::with('user')->byCategories($category->id)
            ->byPublished()->byLanguage()->byApproved()->paginate(20);

        $data['populars'] = Post::byLanguage()
            ->byApproved()
            ->inRandomOrder()
            ->take(6)
            ->get();

        $data['category'] = $category;
        $data['subCategories'] = $subCategories;
        $data['posts'] = $posts;
        $data['menu'] = strtolower($category->name);
        $data['submenu'] = strtolower($category->name);
        $data['page_title'] = strtolower($category->name);

        return view("frontend.categories.index", $data);
    }

    public function subCategoriesOrPost(Request $request)
    {
        $subCategorie = Category::with(['children', 'allChildrens'])->where("name_slug", $request->slug)->first();

        if ($subCategorie){
            $category = $subCategorie->parent;
            $subCategories = $category->allChildrens()->get();
            //Post en avant
            $data['postTops'] = Post::byCategories($category->id)->forHome()->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(2);
            $posts = Post::with('user')->byCategories($subCategorie->id)
                ->byPublished()->byLanguage()->byApproved()->paginate(20);

            $data['populars'] = Post::byLanguage()
                ->byApproved()
                ->inRandomOrder()
                ->take(6)
                ->get();

            $data['category'] = $category;
            $data['subCategories'] = $category->allChildrens()->get();;
            $data['posts'] = $posts;
            $data['menu'] = strtolower($category->name);
            $data['submenu'] = strtolower($subCategorie->name);
            $data['page_title'] = strtolower($category->name) ;

            return view("frontend.categories.index", $data);

        }else{
            $category = Category::with(['children', 'allChildrens'])->where("name_slug", $request->catname)->firstOrFail();
            $data['post'] = $post = Post::with('user')->byLanguage()->where('slug', $request->slug)->firstOrFail();

            $entries = $post->entries()->where('type', '!=', 'answer');
            if ($post->pagination !== null) {
                $entries =  $entries->orderBy('order', $post->ordertype == 'desc' ? 'desc' : 'asc')->paginate($post->pagination);
            } else {
                $entries =  $entries->orderBy('order', 'asc')->get();
            }

            $data['tags'] = $post->tags()->get();
            $data['lastTrending'] = Post::getStats('one_day_stats', 'DESC', 10)
                ->byPublished()
                ->byLanguage()
                ->byApproved()
                ->getCached('post_trending', now()->addMinutes(5));

            $data['has_video_player'] = collect($entries)->contains(function ($entry) {
                return !empty($entry->type) && $entry->type === 'video' && in_array(substr($entry->video, -3),  ['mp4', 'webm']);
            });

            $data['entries'] = $entries;
            $data['category'] = $category;
            $data['menu'] = strtolower($category->name);
            $data['submenu'] = strtolower($category->name);
            $data['page_title'] = strtolower($category->name);
            $data['populars'] = Post::byLanguage()
                ->byApproved()
                ->inRandomOrder()
                ->take(6)
                ->get();

            $data['alires'] = Post::byLanguage()
                ->byApproved()
                ->inRandomOrder()
                ->take(5)
                ->get();

            $data['others'] = Post::byLanguage()
                ->byApproved()
                ->inRandomOrder()
                ->take(6)
                ->get();


            //Nbre de vues
            $data['post']->update(['all_time_stats' => ++$data['post']->all_time_stats]);

            return view('frontend.categories.show', $data);
        }
    }


    public function newsletter(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        if (Newsletter::where('email', $request->email)->first()){
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Oups, cet email est déjà abonné aux newsletters !');
            return back();
        }

        Newsletter::create([
            'email' => htmlspecialchars($request->email),
            'statut' => 1
        ]);

        session()->flash('type', 'alert-success');
        session()->flash('message', 'Votre abonnement aux newsletters à bien été pris en compte !');
        return back();
    }

    public function contact(Request $request){

    }


}
