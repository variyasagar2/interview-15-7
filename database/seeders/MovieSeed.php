<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defulatMovies =[
            [
                "name"=>"Checkmate",
                "description"=>"Checkmate | Harsh Beniwal",
                "url"=>"https://www.youtube.com/watch?v=NlwVW-_LPBs&ab_channel=HarshBeniwal",
                "image"=>"",
                "release_date"=>"2023-08-27 00:00:00",
                "slug"=>"checkmate",
            ],
            [
                "name"=>"IB-71",
                "description"=>"IB-71(2023) | Full Movie | New Hindi Movie 2023 | Vidyut Jamwal | New Action Blockbuster Movie 2023",
                "url"=>"https://www.youtube.com/watch?v=x-lknlNKyvE&ab_channel=NKFilms",
                "image"=>"",
                "release_date"=>"2023-09-20 00:00:00",
                "slug"=>"ib-71",
            ],
            [
                "name"=>"The Kerala Story",
                "description"=>"the Kerala story full movie hindi",
                "url"=>"https://www.youtube.com/watch?v=u9_oRtHyyz8&ab_channel=FlicksAvenue",
                "image"=>"",
                "release_date"=>"2023-09-20 00:00:00",
                "slug"=>"the-kerala-story",
            ]
        ];
        foreach($defulatMovies as $movie){
            Movie::firstOrCreate([
                'slug'=>$movie['slug']
            ],$movie);
        }
    }
}
