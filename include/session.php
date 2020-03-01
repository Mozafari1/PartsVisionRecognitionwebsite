<?php
session_start();
ob_start();
function ErrorMsg()
{
    if (isset($_SESSION["ErrorMsg"])) {
        $Output = "<div class = \"ErrorMsg\">";
        $Output .= htmlentities($_SESSION["ErrorMsg"]);
        $Output .= "</div>";
        $_SESSION["ErrorMsg"] = null;
        return $Output;
    }
}
function SuccessMsg()
{
    if (isset($_SESSION["SuccessMsg"])) {
        $Output = "<div class =\"SuccessMsg\">";
        $Output .= htmlentities($_SESSION["SuccessMsg"]);
        $Output .= "</div>";
        $_SESSION["SuccessMsg"] = null;
        return $Output;
    }
}
