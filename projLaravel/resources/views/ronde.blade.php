<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style>
    .filterable {
        margin-top: 3%;
        width: 100%;
        height: 100%; 
    }
</style>

@extends('layouts.app')

@section('content')
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Ronde</h3>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Date" enabled></th>
                        <th><input type="text" class="form-control" placeholder="Agents" enabled></th>
                        <th><input type="text" class="form-control" placeholder="Ronde" enabled></th>
                        <th><input type="text" class="form-control" placeholder="Username" enabled></th>
                        <th><select id='filterText' style='display:inline-block' onchange='filterText()'>
                                <option disabled selected>Select</option>
                                <option value='Site1'>Site1</option>
                                <option value='Site2'>Site2</option>
                                <option value='Site3'>Site3</option>
                                <option value='all'>All</option>
                            </select></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="content">
                        <td>01</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Site1</td>
                    </tr>
                    <tr class="content">
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Site2</td>
                    </tr>
                    <tr class="content">
                        <td>3</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>Site3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@if(count($agents)>0)
    @foreach($agents as $agents)
    <ul class="list-group">
        <li class="list-group-item">NOM:{{$agents->nom}}</li>
    </ul>
    @endforeach
@endif

@if(count($historiquepointeau)>0)
    @foreach($historiquepointeau as $historiquepointeau)
    <ul class="list-group">
        <li class="list-group-item">Pointeau:{{$historiquepointeau->date}}</li>
        <li class="list-group-item">Pointeau:{{$historiquepointeau->idRonde}}</li>
    </ul>
    @endforeach
@endif

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    /*
     Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
     */
    $(document).ready(function () {
        $('.filterable .btn-filter').click(function () {
            var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function (e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9')
                return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function () {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
            }
        });
    });
    function filterText()
    {
        var rex = new RegExp($('#filterText').val());
        if (rex == "/all/") {
            clearFilter()
        } else {
            $('.content').hide();
            $('.content').filter(function () {
                return rex.test($(this).text());
            }).show();
        }
    }

    function clearFilter()
    {
        $('.filterText').val('');
        $('.content').show();
    }
</script>
