<?php
namespace App\Controller;

use App\Exception\NotFoundException;
use App\Model\Grocery;
use App\Model\Post;
use App\Service\Router;
use App\Service\Templating;

class GroceryController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $posts = Grocery::findAll();
        $html = $templating->render('grocery/index.html.php', [
            'posts' => $posts,
            'router' => $router,
        ]);
        return $html;
    }

    public function createAction(?array $requestPost, Templating $templating, Router $router): ?string
    {
        if ($requestPost) {
            $post = Grocery::fromArray($requestPost);
            // @todo missing validation
            $post->save();

            $path = $router->generatePath('grocery-index');
            $router->redirect($path);
            return null;
        } else {
            $post = new Grocery();
        }

        $html = $templating->render('grocery/create_grocery.html.php', [
            'post' => $post,
            'router' => $router,
        ]);
        return $html;
    }

    public function editAction(int $postId, ?array $requestPost, Templating $templating, Router $router): ?string
    {
        $post = Grocery::find($postId);
        if (! $post) {
            throw new NotFoundException("Missing post with id $postId");
        }

        if ($requestPost) {
            $post->fill($requestPost);
            // @todo missing validation
            $post->save();

            $path = $router->generatePath('grocery-index');
            $router->redirect($path);
            return null;
        }

        $html = $templating->render('grocery/edit_grocery.html.php', [
            'post' => $post,
            'router' => $router,
        ]);
        return $html;
    }

    public function showAction(int $postId, Templating $templating, Router $router): ?string
    {
        $post = Grocery::find($postId);
        if (! $post) {
            throw new NotFoundException("Missing grocery with id $postId");
        }

        $html = $templating->render('grocery/show_grocery.html.php', [
            'post' => $post,
            'router' => $router,
        ]);
        return $html;
    }

    public function deleteAction(int $postId, Router $router): ?string
    {
        $post = Grocery::find($postId);
        if (! $post) {
            throw new NotFoundException("Missing post with id $postId");
        }

        $post->delete();
        $path = $router->generatePath('grocery-index');
        $router->redirect($path);
        return null;
    }
}
