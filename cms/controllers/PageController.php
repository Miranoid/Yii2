<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Categories;
use app\models\Products;
/*Контроллер для страниц сайта*/
class PageController extends Controller
{

    /**
     	Для страницы списка товаров
     */
    public function actionListproducts()
    {

	if(isset($_GET['id'])&& $_GET['id'] !='' && filter_var($_GET['id'], FILTER_VALIDATE_INT))
{
$categories = Categories::find()->where(['id'=>$_GET['id']])->asArray()->one();
if(count($categories) > 0){
$products_array = Products::find()->where(['category'=>$_GET['id']])->asArray()->all();
$count_products = count($products_array);

if(isset($_GET['view']) && $_GET['view'] == 1)
{$view = 1;}
else 
{$view = 0;}

return $this->render('listproducts',compact('categories','products_array'
,'count_products', 'view'));
}
}


return $this->redirect(['page/catalog']);
   
    }

public function actionCatalog()
    {
	$categories = Categories::find()->asArray()->all();
        return $this->render('catalog',compact('categories'));
    }
public function actionProduct()
    {
	//$categories = Categories::find()->asArray()->all();
        return $this->render('product');
    }
public function actionNews()
    {
        return $this->render('news');
    }


public function actionLogin()
    {
        return $this->render('login');
    }

public function actionContacts()
    {
        return $this->render('contacts');
    }

}
