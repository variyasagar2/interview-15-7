<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $movies = Movie::when($request->filter,function($query)use($request){
            $query->where('name','like','%'.$request->filter.'%');
            $query->orWhere('description','like','%'.$request->filter.'%');
        })->when($request->sort && in_array($request->sort,["release_date",'name']),function($query)use($request){
            $query->orderby($request->sort,$request->sort_order=='asc'?'asc':'desc');
        })->get();
        return view('movies.index')->with('movies',$movies);
    }


    public function publicIndex()
    {
        $request = request();
        $movies = Movie::get();
        return view('movies.public-index')->with('movies',$movies);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
                'name'=>'required|max:191',
                'description'=>'required',
                'url' => 'required|url',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
                'release_date' => 'required|date',
                'slug' => 'required|unique:movies',

            ]);
            if( $request->hasFile('image')){
                $file = $request->file('image');
                $destinationPath = 'movies';
                $name = "img-".time().".".$file->getClientOriginalExtension();
                   $file->move($destinationPath,$name);
                   $data['image']=$destinationPath."/".$name;
            }

            Movie::create($data);

            return redirect()->route('manager.movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Movie $movie)
    {
       return view('movies.view')->with('movie',$movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Movie $movie
     * @return \Illuminate\Http\Response
     */
//     3.	Write array Program output as required below (10 marks)
// a.	Use below JSON convert in array

// b.	Using above Json Print all title in ASC orders using array function.
    public function task3()
    {
        $json   ='[{
              "userId": 1,
              "id": 1,
              "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
              "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
            },
            {
              "userId": 1,
              "id": 2,
              "title": "qui est esse",
              "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
            },
            {
              "userId": 1,
              "id": 3,
              "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
              "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
            }]';
            $jsonToarray= json_decode($json);
            $data= collect($jsonToarray);
            $sorted= $data->sortBy('title');  
             return [
                "jsonToarray" => $jsonToarray,
                "sort by title" => $sorted->values()->all(),
             ];
            
    }
// c.	Using array function Get “id” by title name “qui est esse”.
    public function task3c($id){
        $json   ='[{
            "userId": 1,
            "id": 1,
            "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
          },
          {
            "userId": 1,
            "id": 2,
            "title": "qui est esse",
            "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
          },
          {
            "userId": 1,
            "id": 3,
            "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
          }]';
          $jsonToarray= json_decode($json);
          $data= collect($jsonToarray);
          return $data->where('id',$id)->first();
    }

    public function task4($id){
        // a.	Write a query to find those customers with their name and those salesmen with their name and city who lives in the same city.
        $query1= "SELECT c.cust_name as name,c.city FROM `customer` as c join salesman as s on c.city = s.city and c.salesman_id = s.salesman_id;";
        // b.	Write a query to display all the orders which values are greater than the average order value for October 10, 2012.
        $query2="SELECT * FROM `orders` where purch_amt > (select avg(purch_amt) from orders where ord_date = '2012-10-10');";
        // c.	Write a query to list the employee ID, name, salary, department name of all the 'MANAGERS' and 'ANALYST' working in SYDNEY, MELBOURNE with an experience more than 5 years without receiving the commission and display the list in ascending order of location.
        $query3= "select e.emp_id,e.emp_name,e.salary,d.dep_name from employees as e left join department as d on e.dep_id = d.dep_id where  TIMESTAMPDIFF(year,e.hire_date, now()) > 5 and commission is null and d.deo_name in ('MANAGERS','ANALYST') and d.dep_location in ('SYDNEY', 'MELBOURNE') ORDER by d.dep_location asc;";
    }

   
}
