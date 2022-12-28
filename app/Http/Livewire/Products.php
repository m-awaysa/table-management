<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class Products extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Product>
    */
    public function datasource(): Builder
    {
        return Product::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('price')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', function (Product $model) {
                return strtolower(e($model->name));
            })

            ->addColumn('company')
            ->addColumn('discount')
            ->addColumn('description')
            ->addColumn('visibility')
            ->addColumn('amount')
            ->addColumn('category_id')
            ->addColumn('click')
            ->addColumn('image')
            ->addColumn('color')
            ->addColumn('product_code')
            ->addColumn('purchased_price')
            ->addColumn('created_at_formatted', fn (Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Product $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->makeInputRange(),

            Column::make('PRICE', 'price')
                ->sortable()
                ->searchable(),

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('COMPANY', 'company')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('DISCOUNT', 'discount')
                ->sortable()
                ->searchable(),

            Column::make('DESCRIPTION', 'description')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('VISIBILITY', 'visibility')
                ->toggleable(),

            Column::make('AMOUNT', 'amount')
                ->makeInputRange(),

            Column::make('CATEGORY ID', 'category_id')
                ->makeInputRange(),

            Column::make('CLICK', 'click')
                ->makeInputRange(),

            Column::make('IMAGE', 'image')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('COLOR', 'color')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PRODUCT CODE', 'product_code')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PURCHASED PRICE', 'purchased_price')
                ->sortable()
                ->searchable(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Product Action Buttons.
     *
     * @return array<int, Button>
     */

   
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('btn btn-primary cursor-pointer btn-sm text-white px-3 py-2.5 m-1  text-sm')
               ->route('product.edit', ['product' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('btn btn-danger btn-sm cursor-pointer text-white px-3 py-2 m-1  text-sm')
               ->route('product.destroy', ['product' => 'id'])
               ->method('delete')
        ];
    }
    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Product Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($product) => $product->id === 1)
                ->hide(),
        ];
    }
    */
}
