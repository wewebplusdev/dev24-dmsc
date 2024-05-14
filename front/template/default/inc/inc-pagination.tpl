{if $pagination|default:null}
    <div class="pagination-block">
        <div class="default-pagination">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg">
                        <div class="pagination-label">
                            {$languageFrontWeb->all->display->$currentLangWeb} <span class=" pl-2">{$pagination.total|number_format} {$languageFrontWeb->listitem->display->$currentLangWeb}</span>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        {$pageStartShow = $pagination.curent - 2}
                        {$pageEndShow = $pagination.curent + 2}

                        {if $pageStartShow < 1}
                            {$pageStartShow = 1}
                        {/if}

                        {if $pageStartShow - 2 < 0}
                            {$pageEndShow = $pageEndShow + {2 + {$pageStartShow - $pagination.curent}}}
                        {/if}

                        {if $pageEndShow >= $pagination.totalpage}
                            {$pageEndShow = $pagination.totalpage}
                        {/if}

                        {if $pagination.total - $pagination.curent < 2}
                            {$startAdd = 2 - {$pagination.totalpage - $pagination.curent}}
                            {$pageStartShow = $pageStartShow - $startAdd}
                        {/if}

                        {if $pageStartShow < 1}
                            {$pageStartShow = 1}
                        {/if}
                        <div class="pagination">
                            <ul class="item-list">
                                {if $pageStartShow > 1}
                                    <li class="page-item first-page">
                                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}1" class="link">{$languageFrontWeb->firstpageitem->display->$currentLangWeb}</a>
                                    </li>
                                {/if}
                                {if $pagination.curent-1 > 0}
                                    <li class="page-item page-arrow -start">
                                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}" class="link">
                                            <span></span>
                                        </a>
                                    </li>
                                {/if}
    
                                {for $current=$pageStartShow to $pageEndShow}
                                    <li class="page-item">
                                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" class="link {if $current == $pagination.curent}active{/if}">
                                            {$current}
                                        </a>
                                    </li>
                                {/for}

                                <li class="page-item jump-page">
                                    <form method="GET">
                                        <div class="form-group form-select">
                                            <label class="control-label visually-hidden"
                                                for="selectPagination">Pagination</label>
                                            <div class="select-wrapper">
                                                <select class="select-pagination" name="selectPagination" id="selectPagination"
                                                    style="width: 100%;" onchange="window.location = $(this).val()">
                                                    <option value="javascript:void(0)">{$languageFrontWeb->gopage->display->$currentLangWeb}</option>
                                                    {for $current=1 to $pagination.totalpage}
                                                        <option value="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" >{$current}</option>
                                                    {/for}
                                                </select>
                                            </div>
                                        </div>
                                    </form> 
                                </li>
    
                                {if $pagination.curent+1 < $pagination.totalpage}
                                    <li class="page-item page-arrow -end">
                                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" class="link">
                                            <span></span>
                                        </a>
                                    </li>
                                {/if}
                                {if $pagination.curent+2 < $pagination.totalpage}
                                <li class="page-item last-page">
                                    <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.totalpage}" class="link">{$languageFrontWeb->lastpageitem->display->$currentLangWeb}</a>
                                </li>
                                {/if}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}