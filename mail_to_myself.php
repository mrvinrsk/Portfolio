<?php
function getMail($name, $mail, $message)
{
    $body = '
<style>
    h3 {
        font-size: 2rem;
    }

    p {
        font-size: .975rem;
    }

    #mailinfo {
        background-color: #EEE;
        padding: 2rem 1.35rem;
        border-radius: 10px;
    }

    .field {
        padding: .65rem 1rem;
        background-color: #d0d0d0;
        border-radius: 5px;
    }
</style>


<h3>Neue Nachricht vom Portfolio</h3>
<p>Es wurde eine neuen Nachricht auf deinem Portfolio hinterlassen.</p>

<div id="mailinfo">
    <div class="field">
        <h5>Absender</h5>
        <p>$name <$mail></p>
    </div>

    <div class="field">
        <h5>Hinterlassene Nachricht</h5>
        <p>$message</p>
    </div>

    <a href="mailto:$from">Antworten</a>
</div>
';

    return $body;
}