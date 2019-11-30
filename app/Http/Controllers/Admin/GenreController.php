<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Traits\Controllers\ResourceController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.genre';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::genre';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Genre::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'Genre';

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
            'name',
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
}
