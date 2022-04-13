<?php


namespace App\Http\Traits;


use Carbon\Carbon;
use Illuminate\Http\Request;

trait StatTrait
{

    public function recent(Request $request)
    {
        $days = $request->get("days", 7);
        $query = $this->getModel()::query();
        $this->injectDefaultSearchCriteria($query, $request);
        return $this->liteResponse(config("code.request.SUCCESS"), $query->where("created_at", '>', Carbon::now()->subDays($days)->toDateString())->paginate(30)
        );
    }
}
