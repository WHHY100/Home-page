<?php

/**
 * @param string $html
 * @param string $contentPage
 * @param string $pageForm
 * @param string $pageContent
 * @param string $content
 * @return string
 */
function getValues(string $html, string $contentPage, string $pageForm,
                   string $pageContent, string $content): string
{
    $title = new App\tablesPage\ReadTables();
    $titleContent = $title->getResult($contentPage, $pageForm, $pageContent);
    $titleContent = explode('|', $titleContent[0]);

    return str_replace($content, $titleContent[0], $html);
}

/**
 * @param string $html
 * @param string $htmlBox
 * @param string $contentPage
 * @param string $pageForm
 * @param string $pageContent
 * @param string $content
 * @param string $contentBox
 * @param string $contentLink
 * @param string $contentLinkBase
 * @param string $boxContent
 * @param string $contentBase
 * @return string
 */
function getValuesBox(string $html, string $htmlBox, string $contentPage, string $pageForm,
                      string $pageContent, string $content, string $contentBox,
                      string $contentLink, string $contentLinkBase, string $boxContent,
                      string $contentBase): string
{
    $title = new App\tablesPage\ReadTables();
    $titleContent = $title->getResult($contentPage, $pageForm, $pageContent);
    $linkContent = $title->getResult($contentPage, $pageForm, $contentLinkBase);
    $baseContent = $title->getResult($contentPage, $pageForm, $contentBase);
    $contentFin = '';

    $contentHTML = file_get_contents($htmlBox);

    for ($i = 0; $i < count($titleContent); $i++) {
        $contentFin = $contentFin . str_replace($contentBox, substr($titleContent[$i], 0,
                strlen($titleContent[$i]) - 1), $contentHTML);
        $contentFin = str_replace($contentLink, substr($linkContent[$i], 0,
            strlen($linkContent[$i]) - 1), $contentFin);
        $contentFin = str_replace($boxContent, substr($baseContent[$i], 0,
            strlen($baseContent[$i]) - 1), $contentFin);
    }

    return str_replace($content, $contentFin, $html);
}

/**
 * @return string|null
 */
function saveMessage(): ?string
{
    $messageSend = "./view/sendmessage.html";
    $messageWrong = "./view/wrongmessage.html";

    $constValueInput = "wprowadź treść wiadomości";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['message'])) {
            return file_get_contents($messageWrong);
        }

        $message = strip_tags($_POST['message']);
        $message = filter_var($message, FILTER_SANITIZE_STRING);

        if (str_replace(" ", "", $message) === str_replace(" ", "", $constValueInput)) {
            return file_get_contents($messageWrong);
        }

        $saveMsg = new \App\TablesPage\InsertTable();
        $saveMsg->getResult($message);

        if ($saveMsg === False) {
            return file_get_contents($messageWrong);
        }

        return file_get_contents($messageSend);
    }

    return null;
}