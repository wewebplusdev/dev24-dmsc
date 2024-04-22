{if $load_data->_numOfRows gte 1}
    {include file="inc/inc-pagination.tpl" title=title}
{/if}

{literal}
    <script>
    $(".select-pagination").select2({ 
        minimumResultsForSearch: Infinity,
        theme: 'option-pagination'
    });
    </script>
{/literal}