function showBubble(elimId, dir, head, body) {
    msgbox = "<div class='bubble-div' id='bubble-div'><p>" + head + "</p><p>" + body + "</p></div>";
    dirSplit = dir.split(" ");
    $('body').append(msgbox);
    $('#bubble-div').position({
        my: "left top",
        at: dirSplit[0] + "+10 " + dirSplit[1] + "-10",
        of: elimId,
        collision: "fit"
    });
}

function removeBubble() {
    $('#bubble-div').remove();
}