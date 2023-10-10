<?php require_once('Connections/conexionzapatos.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_DatosProductos = 9;
$pageNum_DatosProductos = 0;
if (isset($_GET['pageNum_DatosProductos'])) {
  $pageNum_DatosProductos = $_GET['pageNum_DatosProductos'];
}
$startRow_DatosProductos = $pageNum_DatosProductos * $maxRows_DatosProductos;

$varCategoria_DatosProductos = "0";
if (isset($_GET["cat"])) {
  $varCategoria_DatosProductos = $_GET["cat"];
}
mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_DatosProductos = sprintf("SELECT * FROM tblproducto WHERE tblproducto.intCategoria = %s", GetSQLValueString($varCategoria_DatosProductos, "int"));
$query_limit_DatosProductos = sprintf("%s LIMIT %d, %d", $query_DatosProductos, $startRow_DatosProductos, $maxRows_DatosProductos);
$DatosProductos = mysql_query($query_limit_DatosProductos, $conexionzapatos) or die(mysql_error());
$row_DatosProductos = mysql_fetch_assoc($DatosProductos);

if (isset($_GET['totalRows_DatosProductos'])) {
  $totalRows_DatosProductos = $_GET['totalRows_DatosProductos'];
} else {
  $all_DatosProductos = mysql_query($query_DatosProductos);
  $totalRows_DatosProductos = mysql_num_rows($all_DatosProductos);
}
$totalPages_DatosProductos = ceil($totalRows_DatosProductos/$maxRows_DatosProductos)-1;

$queryString_DatosProductos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_DatosProductos") == false && 
        stristr($param, "totalRows_DatosProductos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_DatosProductos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_DatosProductos = sprintf("&totalRows_DatosProductos=%d%s", $totalRows_DatosProductos, $queryString_DatosProductos);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">

<html dir="LTR" lang="es"><!-- InstanceBegin template="/Templates/Principal_car.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Lista de productos</title>
<!-- InstanceEndEditable -->
<script type="text/javascript" src="iepngfix_tilebg.js"></script>

<link rel="stylesheet" type="text/css" href="stylesheet.css">

<style type="text/css">

.ie6_png 			{behavior: url("iepngfix.htc") }

.ie6_png img		{behavior: url("iepngfix.htc") }

.ie6_png input		{behavior: url("iepngfix.htc") }

</style>

<!--[if IE]>

   <script type="text/javascript" src="ie_png.js"></script>

   <script type="text/javascript">

       ie_png.fix('.png');

   </script>

<![endif]-->

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>

<!-- header //-->

<!-- start -->



<table cellpadding="0" cellspacing="0" border="0" align="center" class="bg_main">

	<tr><td class="bg2_main">



		<table cellpadding="0" cellspacing="0" border="0" align="center" class="bg3_main">

			<tr><td class="row_1">

				

				<table cellpadding="0" cellspacing="0" border="0">

					<tr><td class="head2">

							<table border="0" cellspacing="0" cellpadding="0" class="header">

								<tr>

									<td class="logo"><a href="http://osc3.template-help.com/osc_22575/index.php"><img src="images/33756-vl.png" border="0" alt="" width="231" height="98"></a></td>

								  <td style="width:30%;"><img src="images/part.gif" border="0" alt="" width="1" height="18"></td>

								  <td>&nbsp;</td>

									<td style="width:20%;"><img src="images/part.gif" border="0" alt="" width="1" height="18"></td>

									<td>

				<table cellpadding="0" cellspacing="0" align="right" border="0" style="width:115px;">

					<tr>

						<td class="z1"><b>Compras:</b><span> en su cesta </span><a href="http://osc3.template-help.com/osc_22575/shopping_cart.php">0  productos</a></td>
					</tr>
				</table>									</td>
								</tr>
							</table>			

					</td></tr>

					<tr><td class="head3">

						<table cellpadding="0" cellspacing="0" border="0" class="head3_table">

							<tr>

								<td class="head3_td">

		<table cellpadding="0" cellspacing="0" border="0" class="menu">

			<tr>

				<td><a href="http://osc3.template-help.com/osc_22575/index.php"><img src="images/m1.gif" border="0" alt="" width="58" height="8"></a></td>

				<td class="m_sep"><img src="images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="http://osc3.template-help.com/osc_22575/products_new.php"><img src="images/m2.gif" border="0" alt="" width="103" height="8"></a></td>

				<td class="m_sep"><img src="images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="http://osc3.template-help.com/osc_22575/specials.php"><img src="images/m3.gif" border="0" alt="" width="44" height="8"></a></td>

				<td class="m_sep"><img src="images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="http://osc3.template-help.com/osc_22575/account.php"><img src="images/m4.gif" border="0" alt="" width="53" height="8"></a></td>

				<td class="m_sep"><img src="images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="http://osc3.template-help.com/osc_22575/contact_us.php"><img src="images/m5.gif" border="0" alt="" width="76" height="8"></a></td>
			</tr>
		</table>								</td>

								<td style="padding:16px 0px 0px 0px;"><img src="images/part2.gif" border="0" alt="" width="1" height="19"></td>

								<td style="padding:16px 9px 0px 20px;">

	<form name="search" action="http://osc3.template-help.com/osc_22575/advanced_search_result.php" method="get">	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:215px;" class="header">

		<tr>

			<td style="width:100%;"><input type=text name="keywords" class="go" value=""></td>

			<td style="padding:0px 0px 0px 12px;"><input type="image" src="images/button_search_prod.gif" border="0" alt=""></td>
		</tr>

	</table></form>								</td>

								<td><img src="images/m_right.gif" border="0" alt="" width="8" height="48"></td>
							</tr>
						</table>

					</td></tr>

					<tr><td class="banner"><a href="http://osc3.template-help.com/osc_22575/redirect.php?action=banner&goto=2" target="_blank"><img src="images/banner_02.gif" border="0" alt="Banner2" title=" Banner2 " width="351" height="113"></a></td></tr>
				</table>

				

            </td></tr>

            <tr><td class="cont_padd">           

            

            

<!-- end -->

<!-- start -->







<!-- end --><!-- header_eof //-->



<!-- body //-->

<table border="0" class="main_table" cellspacing="0" cellpadding="0">

<tr>

    <td class="box_width_td_left"><table border="0" class="box_width_left" cellspacing="0" cellpadding="0">

<!-- left_navigation //-->

<!-- categories //-->

          <tr>

            <td>

<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxHeading_table"> 
  <tr> 
    <td><img src="images/infoBoxHeading_tl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_t"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="images/infoBoxHeading_tr.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
  <tr> 
    <td  class="infoBoxHeading_l"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td  class="infoBoxHeading_td">Categorias</td> 
    <td  class="infoBoxHeading_r"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
  </tr> 
  <tr> 
    <td><img src="images/infoBoxHeading_bl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_b"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="images/infoBoxHeading_br.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
</table> 
<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBox2_table"> 
  <tr> 
    <td  class="infoBox2_td"><table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxContents2_table"> 
  <tr> 
     <?php include("includes/catalogo.php"); ?> 
  </tr> 
</table></td> 
  </tr> 
</table>            </td>
          </tr>

<!-- categories_eof //-->

<!-- specials //-->

          <tr>

            <td>

<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxHeading_table"> 
  <tr> 
    <td><img src="images/infoBoxHeading_tl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_t"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="images/infoBoxHeading_tr.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
  <tr> 
    <td  class="infoBoxHeading_l"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td  class="infoBoxHeading_td">Ofertas</td> 
    <td  class="infoBoxHeading_r"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
  </tr> 
  <tr> 
    <td><img src="images/infoBoxHeading_bl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_b"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="images/infoBoxHeading_br.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
</table> 
<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBox_table"> 
  <tr> 
    <td  class="infoBox_td"><table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxContents_table"> 
  <tr> 
    <td align="center"  class="boxText">

                    <table cellpadding="0" cellspacing="0" border="0">

						<tr><td class="pic_padd"><div class="pic2_t">

					<div class="pic2_r">

						<div class="pic2_b">

							<div class="pic2_l">

								<div class="pic2_tl">

									<div class="pic2_tr">

										<div class="pic2_bl">

											<div class="pic2_br">

												<div class="width_100"><a href="http://osc3.template-help.com/osc_22575/product_info.php?products_id=6"><img src="images/006.jpg" border="0" alt="Product #006" title=" Product #006 " width="100" height="99"></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div></td></tr>

						<tr><td class="name_padd"><span><a href="http://osc3.template-help.com/osc_22575/product_info.php?products_id=6">Product #006</a></span></td></tr>

                        <tr><td class="price_padd"><div style="float:left;"><del>$39.99</del></div> <div style="float:right;"><span class="productSpecialPrice">$30.00</span></div></td></tr>
                    </table>				</td> 
  </tr> 
</table></td> 
  </tr> 
</table>            </td>
          </tr>

<!-- specials_eof //-->

<!-- left_navigation_eof //-->

    </table></td>

<!-- body_text //-->

    <td class="content_width_td">			  

                            	

                        

               



			













<div align="right" class="main"><form name="filter" action="index1.php" method="get">
</form></div> 




				<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">

						<tr><td class="cont_heading_td">

							<table cellpadding="0" cellspacing="0" border="0" class="table2">

								<tr><td class="td2">

									<table cellpadding="0" cellspacing="0" border="0" class="table3">

										<tr><td class="td3">

											<table cellpadding="0" cellspacing="0" border="0" class="table4">

												<tr><td class="td4">

				<a href="http://osc3.template-help.com" class="headerNavigation">Inicio</a> &raquo;</td>
											  </tr>
										</table>

									</td></tr>
								</table>

							</td></tr>
						</table>

					</td></tr>
				</table>	

								

<table cellpadding="0" cellspacing="0" border="0"><tr><td class="padd_3">



<div style="background:url(images/line_.gif) 0px 0px repeat-x;"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

		<table border="0" cellspacing="0" cellpadding="0" class="result result_top_padd">

          <tr>

            <td>&nbsp;</td>

            <td class="result_right" align="right">&nbsp;</td>
          </tr>
        </table>



<div style="background:url(images/line_x.gif) 0px 0px repeat-x;padding:0px 0px 1px 0px;"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

<table border="0" width="" cellspacing="0" cellpadding="0"> 
   <tr> 
     <td  class="tableBox_output_td main">
	 
	 <!-- InstanceBeginEditable name="titulo" -->titulo<!-- InstanceEndEditable --> <br/>
	 <!-- InstanceBeginEditable name="contenido" -->
     <table> 
     <tr> 
     	<td> </td> 
     </tr>
     </table>
     
      <div class="resultadoproductos">
                <?php if ($totalRows_DatosProductos > 0) { // Show if recordset not empty ?>
  <?php do { ?>
    <div class="producto brillo"><div class="fotoproducto">
    
    
    <a href="ver_producto.php?recordID=<?php echo $row_DatosProductos['idProducto']; ?>"><img src="documentos/productos/<?php echo $row_DatosProductos['strImagen']; ?>" width="120" height="120" /></a> </div>
   
    <table> 
    
    <tr> 
    	<td>&nbsp;</td> 
    </tr>
    <tr> 
    	<td> Precio: <?php echo $row_DatosProductos['dblPrecio']; ?></td> 
    </tr>
    <tr> 
    	<td><a href="ver_producto.php?recordID=<?php echo $row_DatosProductos['idProducto']; ?>">
	  
	  <?php echo $row_DatosProductos['strNombre']; ?></a> </td> 
    </tr>
   
     </table> 
      
     
    </div>
    <?php } while ($row_DatosProductos = mysql_fetch_assoc($DatosProductos)); ?>
                  <?php } // Show if recordset not empty ?>
            <?php if ($totalRows_DatosProductos == 0) { // Show if recordset empty ?>
                    Todavia no hay productos de esta categoria.
  <?php } // Show if recordset empty ?>
  </div>
  <table width="700"> <tr> 
  <td>
  <table border="0" width="31%">
                  <tr>
                    <td width="9%"><?php if ($pageNum_DatosProductos > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, 0, $queryString_DatosProductos); ?>">Primero</a>
                        <?php } // Show if not first page ?></td>
                    <td width="7%"><?php if ($pageNum_DatosProductos > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, max(0, $pageNum_DatosProductos - 1), $queryString_DatosProductos); ?>">Anterior</a>
                        <?php } // Show if not first page ?></td>
                    <td width="8%"><?php if ($pageNum_DatosProductos < $totalPages_DatosProductos) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, min($totalPages_DatosProductos, $pageNum_DatosProductos + 1), $queryString_DatosProductos); ?>">Siguiente</a>
                        <?php } // Show if not last page ?></td>
                    <td width="76%"><?php if ($pageNum_DatosProductos < $totalPages_DatosProductos) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, $totalPages_DatosProductos, $queryString_DatosProductos); ?>">&Uacute;ltimo</a>
                        <?php } // Show if not last page ?></td>
                  </tr>
                </table> </td> 
  </tr> </table>
                
      <!-- InstanceEndEditable --><br> 
       <br></td>
   </tr> 	
</table> 


<div style="background:url(images/line_x.gif) 0px 100% repeat-x;padding:1px 0px 0px 0px;"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

		<table border="0" cellspacing="0" cellpadding="0" class="result result_bottom_padd">

          <tr>

            <td>&nbsp;</td>

            <td class="result_right" align="right">&nbsp;</td>
          </tr>
        </table>



<div style="background:url(images/line_.gif) 0px 0px repeat-x;padding:0px 0px 0px 0px;"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div> 



		

</td></tr></table>	</td>

<!-- body_text_eof //-->

	<td class="box_width_td_right"><table border="0" class="box_width_right" cellspacing="0" cellpadding="0">

<!-- right_navigation //-->

<!-- right_navigation_eof //-->

    </table></td>
  </tr>
</table>

<!-- body_eof //-->



<!-- footer //-->

			</td></tr>
		</table>

	</td></tr>

	<tr><td><img src="images/spacer.gif" border="0" alt="" width="1" height="15"></td></tr>

	<tr><td class="footer_main">

				

<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer2_main"><tr><td>		

					<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer">

						<tr>
						  <td>&nbsp;</td>
						  <td class="footer2_td"><span><a href="http://osc3.template-help.com/osc_22575/specials.php">Ofertas</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://osc3.template-help.com/osc_22575/advanced_search.php">B&uacute;squeda Avanzada</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://osc3.template-help.com/osc_22575/reviews.php">Comentarios</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://osc3.template-help.com/osc_22575/create_account.php">Crear Cuenta</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://osc3.template-help.com/osc_22575/login.php">Entrar</a></span><br>Copyright &copy; 2011 <a href="http://osc3.template-help.com/osc_22575/index.php">Mobile store</a> &nbsp;&nbsp; <b><a href="http://osc3.template-help.com/osc_22575/privacy.php">Confidencialidad</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://osc3.template-help.com/osc_22575/conditions.php">Condiciones de uso</a></b></td>
						</tr>
					</table>

		

</td></tr></table>		

	</td></tr>
</table>	





<!-- footer_eof //-->

</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($DatosProductos);
?>
