<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Deals\DealsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deals;
use App\Http\Requests\Deals\DealsRequest;

class DealsController extends Controller
{
    protected $dealsService;

    public function __construct(DealsService $dealsService)
    {
        $this->dealsService = $dealsService;
    }
    
    public function index()
    {
        return view('admin.deals.list',[
            'title' => 'The list of deals',
            'deals' => $this->dealsService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.deals.add', [
            'title' => 'Add new deals',
            'deals' => $this->dealsService->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealsRequest $request)
    {
        $result = $this->dealsService->insert($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Deals $deal)
    {
         return view('admin.deals.edit', [
            'title' => 'Edit deals',
            'deal' => $deal,
            'deals' => $this->dealsService->get()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Deals $deals, DealsRequest $request)
    {
        $result = $this->dealsService->update($deals, $request);
        if ($result) {
            return redirect('/admin/deals/list');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->dealsService->destroy($request);

        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);
        }
        return response()->json([
                'error'=> true,
            ]);
    }
}