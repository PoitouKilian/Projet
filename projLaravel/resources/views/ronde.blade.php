<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style>
    .filterable {
        width: 100%;
        height: 100%; 
    }
</style>

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="http://172.18.58.86/projetLaravel/ronde/submit" accept-charset="UTF-8">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <label for="dateDebut">Date début:</label>
                        <input type="date" id="date-start" name="date-start" value="0000-00-00">
                    </td>
                    <td>
                        <label for="dateFin">Date fin:</label>
                        <input type="date" id="date-stop" name="date-stop" value="0000-00-00">
                    </td>
                    <td>
                        <label for="HeureDeDébut:">Heure de début:</label>
                        <input type="time" id="time-start" name="time-start"></td>
                    <td>
                        <label for="HeureDeFin">Heure de fin:</label>
                        <input type="time" id="time-stop" name="time-stop">
                    </td>
                    <td>
                        <input type="submit" value="VALIDER">
                    </td>
                </tr>
            </table>
        </form>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Ronde</h3>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th>DATE</th>
                        <th><input type="text" class="form-control" placeholder="Agents" enabled></th>
                        <th><input type="text" class="form-control" placeholder="Ronde" enabled></th>
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
                    @if(count($ronde)>0)
                    @foreach($ronde as $ronde)
                    <tr class="content">
                        <td>{{$ronde->date}}</td> 
                        <td>{{$ronde->nom}}</td>
                        <td>{{$ronde->idRonde}}</td> 
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

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
