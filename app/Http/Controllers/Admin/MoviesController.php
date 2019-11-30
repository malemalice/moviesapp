<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movies;
use App\Models\Genre;
use App\Traits\Controllers\ResourceController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MoviesController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.movies';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::movies';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Movies::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'Movies';

     /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'name' => 'required|min:3|max:255',
                'date_released' => 'required'
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
            'name', 'date_released','genre_id'
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

    private function createData(){
        return [
            'optGenre'=>Genre::all()->pluck('name')->toArray()
        ];
    }
}
