let input = document.querySelector("#input-search")
let datalist = document.querySelector("#search-option")
let submit_form = document.querySelector("#submit-form")


const searchData = async(value, e) => {
    e.preventDefault()

    const response = await fetch("index.php?find=" + value);
    const json = await response.json();

    return json;
}



const displayOptions = (json, data) => {
    data.innerHTML = ""
    for(let option of json)
    {
        let balise = document.createElement("option")
        balise.setAttribute("class", "options")
        balise.setAttribute("id", option.id)
        balise.setAttribute("value", option.titre)
        data.appendChild(balise)
    }
}


input.addEventListener("keyup", async(e) => {
    let json = await searchData(input.value, e)
    console.log(json)
    displayOptions(json,datalist)
})

submit_form.addEventListener("submit", async (e) => {
    e.preventDefault()
    document.location.href = "recherche.php?search=" + input.value
})