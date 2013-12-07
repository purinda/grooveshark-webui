<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="Purinda Gunasekara">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/style.css" type="text/css"/>
    <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
    <script src="<?php echo BASE_URL; ?>static/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>static/js/grooveshark.js"></script>
</head>
<body>

    <!-- top navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Grooveshark Remote</a>
            </div>
            <div class="navbar-collapse collapse">
                <form class="navbar-form navbar-nav">
                    <div class="form-group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-danger">
                                <span class="glyphicon glyphicon-stop"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-warning">
                                <span class="glyphicon glyphicon-pause"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-success">
                                <span class="glyphicon glyphicon-play"></span>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Vol -->
                <input class="volume" type="range" value="10" min="0" max="10">
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input id="search-query" type="text" placeholder="Search for any music" class="form-control">
                    </div>
                    <button type="button" class="btn btn-success" id="btn-search" data-toggle="modal" data-target="#dialog-search-results">Search</button>
                </form>
            </div><!--/.navbar-collapse -->
        </div>
    </div>
