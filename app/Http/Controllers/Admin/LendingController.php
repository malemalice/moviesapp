<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lending;
use App\Models\Movies;
use App\User;
use App\Traits\Controllers\ResourceController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LendingController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.lending';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::lending';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Lending::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'Lending';

     /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'member_id' => 'required',
                'movies_id' => 'required',
                'date_lending' => 'required',
                'date_returned' => 'required',
            ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * Used to validate update.
     *
     * @param $record
     * @return array
     */
    private function resourceUpdateValidationData($record)
    {
        return $this->resourceStoreValidationData();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param null $record
     * @return array
     */
    private function getValuesToSave(Request $request, $record = null)
    {
        $values = $request->only([
            'member_id', 'movies_id', 'date_lending', 'date_returned'
        ]);

        return $values;
    }

    /**
     * Retrieve the list of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $perPage
     * @param string|null $search
     * @return \Illuminate\Support\Collection
     */
    private function getSearchRecords(Request $request, $perPage = 15, $search = null)
    {
        $query = $this->getResourceModel()::when(! empty($search), function ($query) use ($search) {
            $query->like('name', $search);
        });

        return $query->paginate($perPage);
    }

    private function viewData(){
        return [
            'optMovies'=>Movies::all()->pluck('name')->toArray(),
            'optUsers'=>Movies::all()->pluck('name')->toArray()
        ];
    }
}
