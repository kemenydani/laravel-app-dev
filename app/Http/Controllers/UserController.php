<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
	
	const OPERATORS = [
		'equal_to' => '=',
		'not_equal' => '<>',
		'less_than' => '<',
		'greater_than' => '>',
		'less_than_or_equal_to' => '<=',
		'greater_than_or_equal_to' => '>=',
		'in' => 'IN',
		'not_in' => 'NOT_IN',
		'like' => 'LIKE',
		'between' => 'BETWEEN'
	];
	
	public function index(Request $request){

		
		$filter_conditions = [];
		/*
		if ($request->has('filters')){
			$filters = json_decode($request->get('filters'));
			foreach($filters as $filter){
				if(in_array($filter->method, self::OPERATORS)){
					$filter_conditions[] = [
						$filter->name,
						$filter->method,
						$filter->value
					];
				}
			}
		}
		*/
		$results = User::where(function($query) use ($request) {
			
			if ($request->has('filters')){
				$filters = json_decode($request->get('filters'));
				foreach($filters as $filter){
					//if(in_array($filter->method, self::OPERATORS)){
						$query->where([[$filter->column, $filter->method, $filter->value]]);
					//}
				}
			}
			/*
			$query->where([['name', '=', 'snowy']]);
			$query->orWhere([['name', '=', 'newton.hermiston']]);
			*/
		})->paginate($request->per_page, ['*'], 'page', $request->from_page);
		$response = [
			'pagination' => [
				'total' => $results->total(),
				'per_page' => $results->perPage(),
				'current_page' => $results->currentPage(),
				'last_page' => $results->lastPage(),
				'from' => $results->firstItem(),
				'to' => $results->lastItem()
			],
			'data' => $results
		];
		
		return $response;
		
	}
	
	protected function buildQuery($column, $operator, $request, $query)
	{
		switch ($operator) {
			case 'equal_to':
			case 'not_equal':
			case 'less_than':
			case 'greater_than':
			case 'less_than_or_equal_to':
			case 'greater_than_or_equal_to':
				$query->where($column, $this->operators[$operator], $request->search_query_1);
				break;
			case 'in':
				$query->whereIn($column, explode(',', $request->search_query_1));
				break;
			case 'not_in':
				$query->whereNotIn($column, explode(',', $request->search_query_1));
				break;
			case 'like':
				$query->where($column, 'like', '%'.$request->search_query_1.'%');
				break;
			case 'between':
				$query->whereBetween($column, [
					$request->search_query_1,
					$request->search_query_2
				]);
				break;
			default:
				throw new Exception('Invalid Search Operator', 1);
				break;
		}
		return $query;
	}
	
}
