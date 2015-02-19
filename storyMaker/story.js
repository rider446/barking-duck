var name;
var adj;
var verb;
var noun;
var story;


function create() {



    name = document.getElementById('name').value;
    adj = document.getElementById('adj').value;
    verb = document.getElementById('verb').value;
    noun = document.getElementById('noun').value;

    story = "Once upon a time there was a person named " + name;
    story += " who was very " + adj + ".";
    story += " They were so " + adj;
    story += " that they wanted to " + verb;
    story += " a giant " + noun + "!";

    document.getElementById("a2").innerHTML = story;


}

function clear()
{
    story = "";
    document.getElementById("a2").innerHTML = story;
}

