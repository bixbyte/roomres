self.addEventListener('message', function(e) {

    fetch(e.data, function(xhr) {	

        var result = xhr.responseText;

        //process the JSON
        //var object = JSON.parse(result);

        //SEND BACK THE DATA TO THE UI THREAD FOR DISPLAY
        //self.postMessage(JSON.stringify(object));
        self.postMessage(result);

    });

}, false);


//simple XHR request in pure raw JavaScript
function fetch(url, callback) {
    var xhr;

    //console.log(url);

    if(typeof XMLHttpRequest !== 'undefined') xhr = new XMLHttpRequest();
    else {
        var versions = ["MSXML2.XmlHttp.5.0", 
                        "MSXML2.XmlHttp.4.0",
                        "MSXML2.XmlHttp.3.0", 
                        "MSXML2.XmlHttp.2.0",
                        "Microsoft.XmlHttp"]

        for(var i = 0, len = versions.length; i < len; i++) {
            try {
                xhr = new ActiveXObject(versions[i]);
                break;
            }
            catch(e){}
        } // end for
    }

    xhr.onreadystatechange = ensureReadiness;

    function ensureReadiness() {
        if(xhr.readyState < 4) {
            return;
        }

        if(xhr.status !== 200) {
            return;
        }

        // all is well	
        if(xhr.readyState === 4) {
            callback(xhr);
        }			
    }

    xhr.open('GET', url, true);
    xhr.send('');
}