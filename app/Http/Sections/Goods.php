<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;
use AdminSection;
use App\Country;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Goods
 *
 * @property \App\Goods $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Goods extends Section implements Initializable
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
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::image('image', 'IMG'),

            AdminColumn::link('title')->setLabel('Заголовок')
                ->setSmall('url')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('title', 'like', '%' . $search . '%');
                })
            ,
            AdminColumn::link('slug', 'ЧПУ'),
            AdminColumn::text('view', 'View')->setWidth('70px'),
            AdminColumn::text('click', 'Click')->setWidth('70px'),

            AdminColumnEditable::checkbox('status', 'Запущен')->setWidth('90px'),

            // AdminColumn::boolean('status', 'Status'),

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
            ->paginate(50)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center');

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\Goods::class, 'title')
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
                AdminFormElement::text('url', 'Ссылка')
                    ->required()
                ,

                AdminFormElement::html('<hr>'),
                AdminFormElement::image('image', 'Картинка')
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


            ], 'col-xs-12 col-sm-6 col-md-6 col-lg-6')->addColumn([
                AdminFormElement::text('id', 'ID')->setReadonly(true),

                AdminFormElement::html('<hr>'),
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::select('status', 'Статус тизера', ['Остановть', 'Запустить'])->required()
                    ], 4)->addColumn([
                        AdminFormElement::text('view', 'Показы')->required()
                    ], 3)->addColumn([
                        AdminFormElement::text('click', 'Клики')->required()
                    ], 3)->addColumn([
                        AdminFormElement::text('ctr', 'CTR')->required()
                    ]),

//                AdminFormElement::radio('status', 'Published')->setOptions(['0' => 'Not published', '1' => 'Published'])
//                    ->required(),
                //      AdminFormElement::select('status', 'Статус тизера', ['Остановть', 'Запустить'])->required(),


                AdminFormElement::html('<hr>'),
                AdminFormElement::textarea('note', 'Для заметок')->setRows('5'),

                AdminFormElement::html('<hr>'),

             //  AdminFormElement::multiselect('country', 'country')->setOptions(['RU' => 'Russia', 'BY' => 'Belarus']),
              //  AdminFormElement::multiselect('country', 'Companies', Country::class)->setDisplay('iso'),


     //   AdminFormElement::multiselect('country', 'Geo', Country::class),

             //   AdminFormElement::multiselect('iso', 'Гео')->setModelForOptions(Country::class, 'iso')

            //    AdminFormElement::checkbox('status', )->setOptions(['RU' => 'Russia', 'BY' => 'Belarus'])

            ], 'col-xs-12 col-sm-6 col-md-6 col-lg-6')

        ]);

        //$country = AdminSection::getModel(Country::class)->fireDisplay();

       // $country->getScopes()->push(['withGoods', $id]);
       // $country->setParameter('goods_id', $id);
      //  $country->getColumns()->disableControls();






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
