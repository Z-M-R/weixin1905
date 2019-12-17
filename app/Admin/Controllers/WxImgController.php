<?php

namespace App\Admin\Controllers;

use App\Model\WxImgModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WxImgController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\WxImgModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WxImgModel);

        $grid->column('uid', __('Uid'));
        $grid->column('openid', __('Openid'));
        $grid->column('nickname', __('昵称'));
        $grid->column('imgs', __('图片'))->display(function($img){
            return '<img src="'.$img.'">';
        });
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(WxImgModel::findOrFail($id));

        $show->field('uid', __('Uid'));
        $show->field('openid', __('Openid'));
        $show->field('nickname', __('Nickname'));
        $show->field('imgs', __('Imgs'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WxImgModel);

        $form->text('openid', __('Openid'));
        $form->text('nickname', __('昵称'));
        $form->text('imgs', __('图片'));

        return $form;
    }
}
