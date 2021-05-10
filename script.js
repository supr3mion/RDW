//$.getJSON("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=NF130N", function(data){
    //console.log(data);
//});

function fetchData() {
    fetch('https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=NF130N')
    .then(Response => {
        if (!Response.ok) {
            throw error("ERROR");
        }
        return Response.json();
    })
    .then(data => {
        console.log(data);
        const html = data.map(car => {
            return "<p>Kenteken: " + car.kenteken + "</p>";
        })
        .join("");
        console.log(html);
        document
            .querySelector('.info.kenteken')
            .insertAdjacentHTML('afterernd', "<p></p>")
    })
    .catch(error => {
        console.log(error);
    });
}

fetchData();