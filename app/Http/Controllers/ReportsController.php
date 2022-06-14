<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Family;
use App\Models\Expense;
use App\Models\Community;
use App\Models\Parishioner;
use App\Models\Contribution;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ContributionCategory;

class ReportsController extends Controller
{
    // Expenses report
    public function expenses(Request $request)
    {
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');

        $expenses = Expense::where('id', '!=', 0);
        if($startDate)
            $expenses = $expenses->where('created_at', '>=', $startDate . " 00:00:00");
        if($endDate)
            $expenses = $expenses->where('created_at', '<=', $endDate . " 00:00:00");
        
        $expenses = (!$startDate && !$endDate) ? [] : $expenses->get();
        return view('reports.expenses', compact('expenses'));   
    }


    public function contributions(Request $request){
        // Selection
        $categories = ContributionCategory::all();
        $payment_methods = PaymentMethod::all();

        // Filter
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $category =$request->get('category');
        $paymentMethod =$request->get('paymentMethod');
        
        $contributions = Contribution::where('id', '!=', 0);
        if($startDate)
            $contributions = $contributions->where('created_at', '>=', $startDate . " 00:00:00");
        if($endDate)
            $contributions = $contributions->where('created_at', '<=', $endDate . " 00:00:00");
        if($category)
            $contributions = $contributions->where('category_id', '=', $category);
        if($paymentMethod)
            $contributions = $contributions->where('payment_method_id', '=', $paymentMethod);
        
        $contributions = (!$startDate && !$endDate && !$category && !$paymentMethod) ? [] : $contributions->get();
        
        session()->flashInput($request->input());
        return view('reports.contributions', compact(['categories', 'payment_methods', 'contributions']));
    }

    public function profitAndLoss(Request $request)
    {
        $reportType =$request->get('reportType');
        $month =$request->get('month');
        $year =$request->get('year');
        
        $years = Contribution::selectRaw('distinct year(created_at) as year')->get();
        $categories = Contribution::join('contribution_categories as c', 'c.id', '=', 'contributions.category_id')->selectRaw('distinct contributions.category_id as id, c.name as name')->get();

        if ($reportType && $year && $month) {
            $categoriesArr = [];
            foreach ($categories as $category) {
                $contribution = Contribution::where('category_id', $category->id);
                if ($reportType == 'month') {
                    $contribution = $contribution
                                        ->selectRaw('sum(contributions.amount) as amount, contributions.created_at')
                                        ->groupBy('contributions.category_id')
                                        ->whereRaw('month(contributions.created_at) = ? and year(contributions.created_at) = ?', [$month, $year])
                                        ->first();
                }
                
                if ($reportType == 'annual') {
                    $contribution = $contribution
                                        ->selectRaw('sum(contributions.amount) as amount, contributions.created_at')
                                        ->groupBy('contributions.category_id')
                                        ->whereRaw('year(contributions.created_at) = ?', [$year])
                                        ->first();
                }
    
                array_push($categoriesArr, [
                    'id' => $category->id,
                    'name' => $category->name,
                    'totalAmount' => $contribution,
                    'reportType' => $reportType
                ]);
            }

            if ($reportType == 'annual')
                $expenses = Expense::whereRaw('year(created_at) = ?', [$year])->sum('amount');
            if ($reportType == 'month') 
                $expenses = Expense::whereRaw('month(created_at) = ? and year(created_at) = ?', [$month, $year])->sum('amount');

            $profit = $this->getProfit($categoriesArr, $expenses);
            $totalContributions = $this->getTotalContributions($categoriesArr);
            // return response()->json([$years, $categories, $categoriesArr, $expenses, $profit]);
            return view('reports.profit-and-loss', compact('categoriesArr', 'expenses', 'profit', 'years', 'totalContributions'));
        }
        
        $categoriesArr = [];
        return view('reports.profit-and-loss', compact('categoriesArr', 'years'));
    }
    
    private function getProfit($contributions, $expenses)
    {
        $sumContributions = 0;
        foreach ($contributions as $contribution) {
            $amount = $contribution["totalAmount"] ? $contribution["totalAmount"]->amount : 0;
            $sumContributions += $amount;
        }

        return $sumContributions - $expenses;
    }

    private function getTotalContributions($contributions)
    {
        $sumContributions = 0;
        foreach ($contributions as $contribution) {
            $amount = $contribution["totalAmount"] ? $contribution["totalAmount"]->amount : 0;
            $sumContributions += $amount;
        }

        return $sumContributions;
    }

    public function parishioners(Request $request){

        $families = Family::all();
        $communities = Community::all();
        $zones = Zone::all();


        $zone =$request->get('zone');
        $family =$request->get('family');
        $community =$request->get('community');

        // $parishioners = Parishioner::where('id', '!=', 0);
        $parishioners = Parishioner::join('families', 'families.id', '=', 'parishioners.family_id')
            ->join('communities', 'communities.id' , '=', 'families.community_id')
            ->join('zones', 'communities.zone_id' , '=', 'zones.id');
        
        if($family)
            $parishioners = $parishioners->where('families.id', '=', $family);

        if($community)
            $parishioners = $parishioners->where('communities.id','=',$community);
        
        if($zone)
            $parishioners = $parishioners->where('zones.id','=',$zone);
         
           

        $parishioners = (  !$family && !$community && !$zone) ? [] : $parishioners->get([ 'parishioners.*']);

        return view('reports.parishioners',compact('families','parishioners','communities','zones'));
    }
}

