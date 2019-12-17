<?php

namespace App\Admin\Controllers;

use App\Model\WxMsgModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WxMsgController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\WxMsgModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WxMsgModel);

        $grid->column('uid', __('Uid'));
        $grid->column('openid', __('Openid'));
        $grid->column('nickname', __('昵称'));
        $grid->column('content', __('留言'));
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
        $show = new Show(WxMsgModel::findOrFail($id));

        $show->field('uid', __('Uid'));
        $show->field('openid', __('Openid'));
        $show->field('nickname', __('Nickname'));
        $show->field('content', __('Content'));
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
        $form = new Form(new WxMsgModel);

        $form->text('openid', __('Openid'));
        $form->text('nickname', __('昵称'));
        $form->text('content', __('留言'));

        return $form;
    }
}
