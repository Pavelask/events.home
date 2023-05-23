<?php

namespace App\Tables;

use App\Models\Admin\MembersModel;
use App\Models\Admin\TerritorialOrganizationsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Members extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {

        return MembersModel::query()
                    ->join('territorial_organizations', 'member.name_to', '=', 'territorial_organizations.id')
                    ->join('federal_district', 'member.region', '=', 'federal_district.id')
                    ->select('member.*', 'territorial_organizations.name_to', 'federal_district.name_fo');

//        return DB::table('member')
//            ->leftJoin('territorial_organizations', 'member.name_to', '=', 'territorial_organizations.id')
//            ->paginate(20);

//        return  DB::table('member')
//            ->join('territorial_organizations', 'member.name_to', '=', 'territorial_organizations.id')
//            ->join('federal_district', 'member.region', '=', 'federal_district.id')
//            ->select('member.*', 'territorial_organizations.name_to', 'federal_district.name_fo')
//            ->paginate(20);


    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     * @throws \ProtoneMedia\Splade\Table\LaravelExcelException
     */
    public function configure(SpladeTable $table)
    {

        $table
            ->withGlobalSearch(columns: ['id','surName'])
            ->perPageOptions([10, 20, 30, 40, 50])
            ->column('id', label: 'ID', sortable: true)
            ->column('surName', label: 'Фамилия', sortable: true)
            ->column('firstName', label: 'Имя', hidden: true)
            ->column('middleName', label: 'Отчество', hidden: true)
            ->column('birthDate', label: 'Дата рождения', hidden: true)
            ->column('snils', label: 'СНИЛС', hidden: true)
            ->column('contactPhone', label: 'Контактный номер', hidden: true)
            ->column('workPhone', label: 'Рабочий номер', hidden: true)
            ->column('email', label: 'email', hidden: true)
            ->column('job_title', label: 'Должность', hidden: true)
            ->column('name_to', label: 'Нзвание ТО', hidden: true)
            ->column('name_ppo', label: 'Название ППО', hidden: true)
//            ->column('region', label: 'region', hidden: true)
            ->column('name_fo', label: 'Федеральный округ', hidden: true)
            ->column('note', label: 'Примечания', hidden: true)
            ->column('confirmation', label: 'Потверждено', hidden: true)
            ->column('agreement', label: 'Согласие', hidden: true)
            ->column('edit', label: 'Редактировать', exportAs: false)
            ->column('delete', label: 'Удалить', exportAs: false)
            ->export()
            ->paginate(25);

            // ->searchInput()

            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
