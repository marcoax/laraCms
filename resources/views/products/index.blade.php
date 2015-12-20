@extends('layouts.master')
@section('title', 'Lista prodotti') 
@section('content')
    
     
     @if ( !$products->count() )
        You have no products
     @else
     
       <div class="table-responsive"><table id="list_articoli" class="table table-striped table-bordered table-condensed table-hover table-shadow">
<thead>
<tr>
<th class="cktd" title="Seleziona"></th>
<th style="display:none">Id</th>
<th style="display:none">Img</th>
<th style="display:none">ImgBanner</th>
<th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=Code&amp;ordertype=ASC&amp;page=1">Template</a>
</th><th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=parent&amp;ordertype=ASC&amp;page=1">Parent</a>
</th><th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=pageCode&amp;ordertype=ASC&amp;page=1">Slug</a>
</th><th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=Name&amp;ordertype=ASC&amp;page=1">Titolo</a>
</th><th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=Sort&amp;ordertype=ASC&amp;page=1">Ordine</a>
</th><th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=Pub&amp;ordertype=ASC&amp;page=1">Off/Online</a>
</th><th nowrap=""><a class="sort" title="order by " href="/macms/admin/list.php?Id_sez=articoli&amp;Id_sub=&amp;mode=&amp;limit=50&amp;parola=&amp;orderby=&amp;ordertype=&amp;orderby=flagMenuTop&amp;ordertype=ASC&amp;page=1">MenuTop</a>
</th><th class="col-sm-1" style="text-align:center" title="Modifica">Modifica</th><th class="col-sm-1" style="text-align:center">Duplica</th><th class="col-sm-1" style="text-align:center" title="Elimina">Elimina</th>
</tr>
</thead>
<tbody>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[46]" id="list_46" value="46">
</td>

<td style="display:none"><input type="text" value="46" class="" name="Id[46]"></td>
<td style="display:none"><input type="text" value="" class="" name="Img[46]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[46]"></td>
<td nowrap="" class="col-sm-1">index</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">home</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=46">HOME</a></td>
<td class="col-sm-2"><input type="text" value="10" class="" name="Sort[46]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_46').val(0);updateItemFromList('articoli_Pub_46')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_46').val(1);updateItemFromList('articoli_Pub_46')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[46]" id="Pub_46" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_46').val(0);updateItemFromList('articoli_flagMenuTop_46')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_46').val(1);updateItemFromList('articoli_flagMenuTop_46')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[46]" id="flagMenuTop_46" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=46"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=46">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('46');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowD">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[2]" id="list_2" value="2">
</td>

<td style="display:none"><input type="text" value="2" class="" name="Id[2]"></td>
<td style="display:none"><input type="text" value="page_image.jpg" class="" name="Img[2]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[2]"></td>
<td nowrap="" class="col-sm-1">page</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">azienda</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=2">Azienda</a></td>
<td class="col-sm-2"><input type="text" value="100" class="" name="Sort[2]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_2').val(0);updateItemFromList('articoli_Pub_2')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_2').val(1);updateItemFromList('articoli_Pub_2')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[2]" id="Pub_2" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_2').val(0);updateItemFromList('articoli_flagMenuTop_2')" class="btn btn-default btn-sm  active" type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_2').val(1);updateItemFromList('articoli_flagMenuTop_2')" class="btn btn-default btn-sm " type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="0" name="flagMenuTop[2]" id="flagMenuTop_2" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=2"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=2">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('2');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[17]" id="list_17" value="17">
</td>

<td style="display:none"><input type="text" value="17" class="" name="Id[17]"></td>
<td style="display:none"><input type="text" value="page_image.jpg" class="" name="Img[17]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[17]"></td>
<td nowrap="" class="col-sm-1">listapagine</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">prodotti</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=17">Prodotti</a></td>
<td class="col-sm-2"><input type="text" value="300" class="" name="Sort[17]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_17').val(0);updateItemFromList('articoli_Pub_17')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_17').val(1);updateItemFromList('articoli_Pub_17')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[17]" id="Pub_17" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_17').val(0);updateItemFromList('articoli_flagMenuTop_17')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_17').val(1);updateItemFromList('articoli_flagMenuTop_17')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[17]" id="flagMenuTop_17" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=17"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=17">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('17');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowD">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[30]" id="list_30" value="30">
</td>

<td style="display:none"><input type="text" value="30" class="" name="Id[30]"></td>
<td style="display:none"><input type="text" value="catalogo.jpg" class="" name="Img[30]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[30]"></td>
<td nowrap="" class="col-sm-1">listapagine</td>
<td nowrap="" class="col-sm-1">Prodotti</td>
<td nowrap="" class="col-sm-1">fornostampi</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=30">I FornoStampi</a></td>
<td class="col-sm-2"><input type="text" value="310" class="" name="Sort[30]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_30').val(0);updateItemFromList('articoli_Pub_30')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_30').val(1);updateItemFromList('articoli_Pub_30')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[30]" id="Pub_30" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_30').val(0);updateItemFromList('articoli_flagMenuTop_30')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_30').val(1);updateItemFromList('articoli_flagMenuTop_30')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[30]" id="flagMenuTop_30" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=30"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=30">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('30');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[31]" id="list_31" value="31">
</td>

<td style="display:none"><input type="text" value="31" class="" name="Id[31]"></td>
<td style="display:none"><input type="text" value="catalogo.jpg" class="" name="Img[31]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[31]"></td>
<td nowrap="" class="col-sm-1">listapagine</td>
<td nowrap="" class="col-sm-1">Prodotti</td>
<td nowrap="" class="col-sm-1">ecostampi-cartoon-film</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=31">EcoStampi Cartoon/film</a></td>
<td class="col-sm-2"><input type="text" value="320" class="" name="Sort[31]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_31').val(0);updateItemFromList('articoli_Pub_31')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_31').val(1);updateItemFromList('articoli_Pub_31')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[31]" id="Pub_31" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_31').val(0);updateItemFromList('articoli_flagMenuTop_31')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_31').val(1);updateItemFromList('articoli_flagMenuTop_31')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[31]" id="flagMenuTop_31" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=31"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=31">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('31');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowD">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[32]" id="list_32" value="32">
</td>

<td style="display:none"><input type="text" value="32" class="" name="Id[32]"></td>
<td style="display:none"><input type="text" value="catalogo.jpg" class="" name="Img[32]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[32]"></td>
<td nowrap="" class="col-sm-1">listapagine</td>
<td nowrap="" class="col-sm-1">Prodotti</td>
<td nowrap="" class="col-sm-1">eco-stampi-paper</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=32">Eco Stampi Paper</a></td>
<td class="col-sm-2"><input type="text" value="330" class="" name="Sort[32]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_32').val(0);updateItemFromList('articoli_Pub_32')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_32').val(1);updateItemFromList('articoli_Pub_32')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[32]" id="Pub_32" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_32').val(0);updateItemFromList('articoli_flagMenuTop_32')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_32').val(1);updateItemFromList('articoli_flagMenuTop_32')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[32]" id="flagMenuTop_32" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=32"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=32">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('32');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[34]" id="list_34" value="34">
</td>

<td style="display:none"><input type="text" value="34" class="" name="Id[34]"></td>
<td style="display:none"><input type="text" value="catalogo.jpg" class="" name="Img[34]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[34]"></td>
<td nowrap="" class="col-sm-1">listapagine</td>
<td nowrap="" class="col-sm-1">Prodotti</td>
<td nowrap="" class="col-sm-1">tulip-cup</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=34">Tulip Cup</a></td>
<td class="col-sm-2"><input type="text" value="340" class="" name="Sort[34]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_34').val(0);updateItemFromList('articoli_Pub_34')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_34').val(1);updateItemFromList('articoli_Pub_34')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[34]" id="Pub_34" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_34').val(0);updateItemFromList('articoli_flagMenuTop_34')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_34').val(1);updateItemFromList('articoli_flagMenuTop_34')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[34]" id="flagMenuTop_34" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=34"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=34">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('34');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowD">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[35]" id="list_35" value="35">
</td>

<td style="display:none"><input type="text" value="35" class="" name="Id[35]"></td>
<td style="display:none"><input type="text" value="catalogo.jpg" class="" name="Img[35]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[35]"></td>
<td nowrap="" class="col-sm-1">listapagine</td>
<td nowrap="" class="col-sm-1">Prodotti</td>
<td nowrap="" class="col-sm-1">easy-bake</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=35">Easy Bake</a></td>
<td class="col-sm-2"><input type="text" value="350" class="" name="Sort[35]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_35').val(0);updateItemFromList('articoli_Pub_35')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_35').val(1);updateItemFromList('articoli_Pub_35')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[35]" id="Pub_35" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_35').val(0);updateItemFromList('articoli_flagMenuTop_35')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_35').val(1);updateItemFromList('articoli_flagMenuTop_35')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[35]" id="flagMenuTop_35" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=35"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=35">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('35');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[16]" id="list_16" value="16">
</td>

<td style="display:none"><input type="text" value="16" class="" name="Id[16]"></td>
<td style="display:none"><input type="text" value="page_image.jpg" class="" name="Img[16]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[16]"></td>
<td nowrap="" class="col-sm-1">download</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">download</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=16">Downloads</a></td>
<td class="col-sm-2"><input type="text" value="400" class="" name="Sort[16]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_16').val(0);updateItemFromList('articoli_Pub_16')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_16').val(1);updateItemFromList('articoli_Pub_16')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[16]" id="Pub_16" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_16').val(0);updateItemFromList('articoli_flagMenuTop_16')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_16').val(1);updateItemFromList('articoli_flagMenuTop_16')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[16]" id="flagMenuTop_16" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=16"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=16">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('16');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowD">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[6]" id="list_6" value="6">
</td>

<td style="display:none"><input type="text" value="6" class="" name="Id[6]"></td>
<td style="display:none"><input type="text" value="" class="" name="Img[6]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[6]"></td>
<td nowrap="" class="col-sm-1">contatti</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">contatti</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=6">Contatti</a></td>
<td class="col-sm-2"><input type="text" value="500" class="" name="Sort[6]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_6').val(0);updateItemFromList('articoli_Pub_6')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_6').val(1);updateItemFromList('articoli_Pub_6')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[6]" id="Pub_6" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_6').val(0);updateItemFromList('articoli_flagMenuTop_6')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_6').val(1);updateItemFromList('articoli_flagMenuTop_6')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[6]" id="flagMenuTop_6" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=6"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=6">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('6');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[4]" id="list_4" value="4">
</td>

<td style="display:none"><input type="text" value="4" class="" name="Id[4]"></td>
<td style="display:none"><input type="text" value="" class="" name="Img[4]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[4]"></td>
<td nowrap="" class="col-sm-1">lista</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">news</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=4">News</a></td>
<td class="col-sm-2"><input type="text" value="600" class="" name="Sort[4]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_4').val(0);updateItemFromList('articoli_Pub_4')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_4').val(1);updateItemFromList('articoli_Pub_4')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[4]" id="Pub_4" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_4').val(0);updateItemFromList('articoli_flagMenuTop_4')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_4').val(1);updateItemFromList('articoli_flagMenuTop_4')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="flagMenuTop[4]" id="flagMenuTop_4" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=4"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=4">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('4');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowD">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[25]" id="list_25" value="25">
</td>

<td style="display:none"><input type="text" value="25" class="" name="Id[25]"></td>
<td style="display:none"><input type="text" value="" class="" name="Img[25]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[25]"></td>
<td nowrap="" class="col-sm-1">privacy</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">privacy</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=25">Privacy Policy</a></td>
<td class="col-sm-2"><input type="text" value="600" class="" name="Sort[25]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_25').val(0);updateItemFromList('articoli_Pub_25')" class="btn btn-default btn-sm " type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_25').val(1);updateItemFromList('articoli_Pub_25')" class="btn btn-default btn-sm  active" type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="1" name="Pub[25]" id="Pub_25" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_25').val(0);updateItemFromList('articoli_flagMenuTop_25')" class="btn btn-default btn-sm  active" type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_25').val(1);updateItemFromList('articoli_flagMenuTop_25')" class="btn btn-default btn-sm " type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="0" name="flagMenuTop[25]" id="flagMenuTop_25" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=25"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=25">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('25');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>

<tr class="rowP">
<td class="cktd" title="Seleziona"><input type="checkbox" class="checkbox" name="list[5]" id="list_5" value="5">
</td>

<td style="display:none"><input type="text" value="5" class="" name="Id[5]"></td>
<td style="display:none"><input type="text" value="" class="" name="Img[5]"></td>
<td style="display:none"><input type="text" value="" class="input-mini" name="ImgBanner[5]"></td>
<td nowrap="" class="col-sm-1">utility</td>
<td nowrap="" class="col-sm-1"></td>
<td nowrap="" class="col-sm-1">slider</td>
<td nowrap="" class="col-sm-1"><a title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=5">Hp slider</a></td>
<td class="col-sm-2"><input type="text" value="1000" class="" name="Sort[5]"></td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#Pub_5').val(0);updateItemFromList('articoli_Pub_5')" class="btn btn-default btn-sm  active" type="button">&nbsp;No&nbsp;</button><button onclick="$('#Pub_5').val(1);updateItemFromList('articoli_Pub_5')" class="btn btn-default btn-sm " type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="0" name="Pub[5]" id="Pub_5" class="input-mini">
</td>
<td class="">
<div data-toggle="buttons-radio" class="btn-group"><button onclick="$('#flagMenuTop_5').val(0);updateItemFromList('articoli_flagMenuTop_5')" class="btn btn-default btn-sm  active" type="button">&nbsp;No&nbsp;</button><button onclick="$('#flagMenuTop_5').val(1);updateItemFromList('articoli_flagMenuTop_5')" class="btn btn-default btn-sm " type="button">&nbsp;Si&nbsp;</button></div><input type="hidden" value="0" name="flagMenuTop[5]" id="flagMenuTop_5" class="input-mini">
</td><td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" title="Modifica" href="http://localhost/macms/admin/edit.php?mode=edit&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=5"><i class="fa fa-copy"></i> Modifica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm btn-primary" href="http://localhost/macms/admin/edit.php?mode=copia&amp;Id_sez=articoli&amp;Id_sub=&amp;Id=5">&nbsp;<i class="fa fa-copy"></i> Duplica</a></td>
<td class="col-sm-1" style="text-align:center"><a class="btn btn-sm  btn-danger" title="Elimina" onclick="delItem('5');return false" href="#"><i class="fa fa-trash"></i> Elimina</a></td></tr>
</tbody>
</table>
</div>
     
     
	    <ul>
            @foreach( $products as $product )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('products.destroy', $product->slug))) !!}
                        <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                        (
                            {!! link_to_route('products.edit', 'Edit', array($product->slug), array('class' => 'btn btn-info')) !!},
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif
    
     <p>
        {!! link_to_route('products.create', 'Create Product') !!}
    </p>
@endsection


