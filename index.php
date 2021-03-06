<!DOCTYPE html>
<html ng-app="ratingsApp">
<head lang="en">
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/ratings.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.2.0-dist/css/bootstrap.min.css">
    <title></title>
</head>
<body ng-controller="MoviesController as moviesCntrl">

<div id="navigationbar">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="#">Movieee Verdicts</a>
            </div>

            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input ng-model="searchMovies" type="text" class="form-control" placeholder="Search...">
                    <span class="glyphicon glyphicon-glass"></span>
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="#" ng-click="sortCriteria='rating';reverse=!reverse">Rating <span
                        class="glyphicon glyphicon-sort"></span></a></li>
                <li><a href="#" ng-click="sortCriteria='releaseDate';reverse=!reverse">Release Date <span
                        class="glyphicon glyphicon-sort"></span></a></li>
                <li><a href="#" ng-click="sortCriteria='title';reverse=!reverse">Title <span
                        class="glyphicon glyphicon-sort"></span></a></li>
            </ul>

        </div>
    </nav>
</div>
<!-- NavBar ends-->

<div class="row">
    <div class="row col-md-9" id="movies">

        <div ng-repeat="movie in movies | filter:searchMovies | orderBy:sortCriteria:reverse" class="col-md-4">

            <div id="moviePoster">
                <img ng-src="{{movie.image}}" class="img-rounded"/>
            </div>

            <div id="details" class="img-rounded">

                <div id="movieTitle">
                    {{movie.title}}
                </div>

                <div id="releaseDate">
                    <span>{{movie.releaseDate | date:'mediumDate' }}</span>
                </div>


                <div id="numericRating">
                    Rating: {{moviesCntrl.getNumericRating(movie.rating,movie.releaseDate)}}
                </div>

                <div id="starRating" >
                    <span href="#"
                          id="star"
                          data-content=" This is the body of Popover" rel="popover"
                          ng-repeat="star in moviesCntrl.starRatings"
                          ng-click="movie.rating=moviesCntrl.getRating(star,movie.releaseDate)"
                          ng-class="moviesCntrl.getStarStyleClass(star,movie.rating)"
                          >

                    </span>
                </div>


            </div>
        </div>

    </div>

    <div id="reviewStats" class="col-md-3"></div>

</div>

<!-- added jquery as a bootstrap dependency...did not use it anywhere-->
<script src="lib/angular.min.js"></script>
<script src="lib/jquery-2.1.1.min.js"></script>
<script src="lib/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<script src="lib/highcharts.js"></script>
<script src="lib/highcharts-3d.js"></script>
<script src="scripts/ratingsapp.js"></script>

</body>
</html>