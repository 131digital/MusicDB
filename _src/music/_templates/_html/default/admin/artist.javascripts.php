var itunes_return = '';
function artist_youtube(obj1_id,obj2_id) {
	var youtube="http://www.youtube.com/artist/" + document.getElementById(obj1_id).value.replace(/\s/gi,"_");
    document.getElementById(obj2_id).value = youtube;
}

function search_itunes_id(name,txtbox) {
    itunes_return = txtbox;
    var url = "http://itunes.apple.com/search?term=" + name + "&entity=song&callback=get_itunes_id";
    $.getScript(url);
}

function get_itunes_id(json) {
    if(json.resultCount == 0 ) {
        alert("ID Not Found In iTunes");
    } else {
        $("#" + itunes_return).val(json.results[0].artistId);
        var url = json.results[0].artistViewUrl;
        window.open(url);
    }
}