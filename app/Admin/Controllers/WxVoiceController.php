<?php

namespace App\Admin\Controllers;

use App\Model\WxVoiceModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WxVoiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\WxVoiceModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WxVoiceModel);

        $grid->column('uid', __('Uid'));
        $grid->column('openid', __('Openid'));
        $grid->column('nickname', __('Nickname'));
        $grid->column('voice', __('语音'));
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
        $show = new Show(WxVoiceModel::findOrFail($id));

        $show->field('uid', __('Uid'));
        $show->field('openid', __('Openid'));
        $show->field('nickname', __('Nickname'));
        $show->field('voice', __('Voice'));
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
        $form = new Form(new WxVoiceModel);

        $form->text('openid', __('Openid'));
        $form->text('nickname', __('Nickname'));
        $form->text('voice', __('语音'));

        return $form;
    }
}
