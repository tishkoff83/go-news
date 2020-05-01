<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class News
 *
 * @property \App\News $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class News extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-file-text');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $columns = [
            // AdminColumn::text('id', 'ID')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::image('image', 'IMG')
                ->setSmall('id')
            ,
            AdminColumn::link('title')->setLabel('Заголовок')
                ->setSmall('url')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('title', 'like', '%' . $search . '%');
                })
            ,
            // AdminColumn::text('title', 'Заголовок'),
            // AdminColumn::text('title', 'Title'),
            AdminColumn::link('slug', 'Slug', 'created_at')
//                ->setSearchCallback(function ($column, $query, $search) {
//                    return $query
//                        ->orWhere('slug', 'like', '%' . $search . '%')
//                        ->orWhere('created_at', 'like', '%' . $search . '%');
//                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('created_at', $direction);
                })
            ,
            AdminColumn::text('view', 'View')->setWidth('70px'),
            AdminColumn::text('click', 'Click')->setWidth('70px'),


            AdminColumn::boolean('status', 'Status'),

            AdminColumn::text('created_at', 'Created / updated', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false)
            ,
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(30)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center');

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\News::class, 'title')
                ->setLoadOptionsQueryPreparer(function ($element, $query) {
                    return $query;
                })
                ->setDisplay('title')
                ->setColumnName('title')
                ->setPlaceholder('Все заголовки статей')
            ,
        ]);
        $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()->addColumn([
                AdminFormElement::text('title', 'Заголовок')
                    ->required()
                ,
                AdminFormElement::html('<hr>'),
                AdminFormElement::ckeditor('body', 'Статья')
                    ->required()
                ,

                AdminFormElement::html('<hr>'),
                AdminFormElement::text('slug', 'ЧПУ')
                    ->required()
                ,
                AdminFormElement::html('<hr>'),
                AdminFormElement::datetime('created_at', 'Дата добавления')
                    ->required()
                    ->setVisible(true)
                    ->setReadonly(false)
                ,

                AdminFormElement::html('<hr>'),
                AdminFormElement::text('link', 'Источник'),

                AdminFormElement::html('<hr>'),
                AdminFormElement::text('origin_link', 'Parse link'),

                //  AdminFormElement::html('last AdminFormElement without comma')

            ], 'col-xs-12 col-sm-6 col-md-6 col-lg-6')->addColumn([
                AdminFormElement::text('id', 'ID')->setReadonly(true),

                AdminFormElement::html('<hr>'),
                AdminFormElement::text('url', 'Ссылка'),

                AdminFormElement::html('<hr>'),
                AdminFormElement::image('image', 'Картинка')
                    ->required()
                ,

                AdminFormElement::html('<hr>'),
                AdminFormElement::select('status', 'Статус тизера', ['Остановть', 'Запустить'])
                    ->required()
                ,

                AdminFormElement::html('<hr>'),
                AdminFormElement::textarea('note', 'Для заметок')->setRows('5'),

                AdminFormElement::html('<hr>'),
                AdminFormElement::text('view', 'Показы'),




            ], 'col-xs-12 col-sm-6 col-md-6 col-lg-6')
        ]);


        $form->getButtons()->setButtons([
            'save' => new Save(),
            'save_and_close' => new SaveAndClose(),
            'save_and_create' => new SaveAndCreate(),
            'cancel' => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
