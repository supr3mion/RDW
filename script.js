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
        const kenteken = data.map(car => {
            return "<p>" + car.kenteken + "</p>";
        })
        .join("");
        document.querySelector("#info .kenteken").insertAdjacentHTML("beforeend", kenteken);

        const informatie = data.map(car => {
            return '<div class="car-info">' + 
            '<p>Cilinders: ' + car.aantal_cilinders + '</p>' +
            '<p>Deuren: ' + car.aantal_deuren + '</p>' +
            '<p>Wielen: ' + car.aantal_wielen + '</p>' +
            '<p>Zitplaatsen: ' + car.aantal_zitplaatsen + '</p>' +
            '</div>';
        }).join("");
        document.querySelector("#info .informatie").insertAdjacentHTML("beforeend", informatie);
        
    })
    .catch(error => {
        console.log(error);
    });
}

fetchData();