<?php include('header.php'); ?>

<!-- body content -->
<div class="main">
    <div class="container" role="main">
        <div class="panel panel-primary">
            <div class="panel-heading">Playlist</div>
            <div class="panel-body">
                <table id="playlist" class="table table-hover table-condensed">
                    <thead>
                        <th class="playlist-col-1">Song</th>
                        <th class="playlist-col-2">Artist</th>
                        <th class="playlist-col-3"></th>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($playlist as $song_id => $song) {
                            echo '<tr data-songid="' . $song['SongID'] . '" ' . 'data-song="' . htmlentities(json_encode($song)) . '">';
                            echo '<td>' . $song['SongName'] . '</td>';
                            echo '<td>' . $song['ArtistName'] . '</td>';
                            echo '<td><div class="btn-group btn-group-sm"><button type="button" class="btn btn-info btn-play"><span class="glyphicon glyphicon-play"></span></button><button type="button" class="btn btn-success btn-thumbs-up"><span class="glyphicon glyphicon-thumbs-up"></span></button><button type="button" class="btn btn-warning btn-thumbs-down"><span class="glyphicon glyphicon-thumbs-down"></span></button></td>';
                            echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Search results dialog -->
<div class="modal fade" id="dialog-search-results" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Look what we found!</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-queueall">Queue all</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include('footer.php');
