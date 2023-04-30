<?php

// Default Credentials
// ports list
// Default Router Settings
function generatePagination($page, $totalPages)
{
    $pageLink = '&page=%d';
    $paginationContainer = '<div class="pagination">';

    if ($totalPages != 0) {
        if ($page == 1) {
            $paginationContainer .= '';
        } else {
            $paginationContainer .= sprintf('<a class="pageNav" id="' . $pageLink . '" href="javascript:void(0)"> &#171; prev page</a>', $page - 1);
        }

        $paginationContainer .= ' <span> page <strong>' . $page . '</strong> from ' . $totalPages . '</span>';

        if ($page == $totalPages) {
            $paginationContainer .= '';
        } else {
            $paginationContainer .= sprintf('<a class="pageNav" id="' . $pageLink . '" href="javascript:void(0)"> next page &#187; </a>', $page + 1);
        }
    }

    $paginationContainer .= '</div>';

    return $paginationContainer;
}