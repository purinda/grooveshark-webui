var grooveshark = {

    searchResults: [],

    showSearchResults: function(query) {
        grooveshark.getSongs(query).done(function(data) {
            grooveshark.searchResults = data;
            var modalResultsDiv       = $('div.modal-body');
            // Clear prev results
            modalResultsDiv.empty();

            var tableResults    = $('<table class="table table-hover table-condensed table-search-results"><thead> <th class="search-result-col-1">Song</th> <th class="search-result-col-2">Artist</th> <th class="search-result-col-3"></th> </thead></table>');
            $.each(data, function(index, obj) {
                var tableRow        = $('<tr data-index="' + index + '"></tr>');
                var rowColumnSong   = $('<td><small>' + obj.SongName   + '</small></td>').appendTo(tableRow);
                var rowColumnArtist = $('<td><small>' + obj.ArtistName + '</small></td>').appendTo(tableRow);
                var btnGroup        = $('<div class="btn-group btn-group-xs"><button type="button" class="btn btn-info btn-play"><span class="glyphicon glyphicon-play"></span></button><button type="button" class="btn btn-primary btn-queue"><span class="glyphicon glyphicon-plus"></span></button>');
                var rowColumnArtist = $('<td></td>').append(btnGroup).appendTo(tableRow);
                tableRow.appendTo(tableResults);
            });
            tableResults.appendTo(modalResultsDiv);
        });
    },

    getSongs:  function(query) {
        return $.ajax({
            url  : "main/search/" + encodeURIComponent(query),
            type : "get"
        });
    },

    queueSong:  function(song) {
        return $.ajax({
            url  : "main/playlist/add",
            type : "post",
            data : {
                'song': song
            }
        });
    },

    playSong: function(song) {
        return $.ajax({
            url  : "main/play",
            type : "post",
            data : {
                'song': song
            }
        });
    },

    addToPlaylist: function(songIndex) {
        var song          = grooveshark.searchResults[songIndex];
        var existingSongs = [];

        $('#playlist > tbody  > tr').each(function(index, tr) {
            var iteratorSongId            = $(tr).data('songid');
            existingSongs[iteratorSongId] = true;
        });

        // Check if the song already exists
        if (typeof existingSongs[song.SongID] !== 'undefined') {
            return;
        }

        var playlist        = $('#playlist');
        var tableRow        = $('<tr data-songid="' + song.SongID + '"></tr>');
        var rowColumnSong   = $('<td>' + song.SongName   + '</td>').appendTo(tableRow);
        var rowColumnArtist = $('<td>' + song.ArtistName + '</td>').appendTo(tableRow);
        var btnGroup        = $('<div class="btn-group btn-group-sm"><button type="button" class="btn btn-info btn-play"><span class="glyphicon glyphicon-play"></span></button><button type="button" class="btn btn-success btn-thumbs-up"><span class="glyphicon glyphicon-thumbs-up"></span></button><button type="button" class="btn btn-warning btn-thumbs-down"><span class="glyphicon glyphicon-thumbs-down"></span></button>');
        var rowColumnArtist = $('<td></td>').append(btnGroup).appendTo(tableRow);

        playlist.append(tableRow);
        // Make an ajax call to pass song to the server end.
        grooveshark.queueSong(song);
    },

    search: function(query) {
        grooveshark.showSearchResults(query);
    }
};

$(document).ready(function() {
    //
    // Call app functions
    //

    // Search
    $('#btn-search').on('click', function(e) {
        var query = $('#search-query').val();
        if (query.trim().length <= 0) {
            e.preventDefault();
            return false;
        }

        grooveshark.search(query);
    });

    // Add to playlist
    $('div.modal-body').delegate('button.btn-queue', 'click', function(e) {
        var songId = $(e.target).parents('tr').data('index');
        grooveshark.addToPlaylist(songId);
    });

    // Play song
    $('#playlist').delegate('button.btn-play', 'click', function(e) {
        var song = $(e.target).parents('tr').data('song');
        grooveshark.playSong(song);
    });

});
