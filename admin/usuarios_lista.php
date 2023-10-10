<?php require_once('../Connections/conexionzapatos.php'); ?>
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

mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_DatosUsuarios = "SELECT * FROM tblusuario ORDER BY tblusuario.strNombre ASC";
$DatosUsuarios = mysql_query($query_DatosUsuarios, $conexionzapatos) or die(mysql_error());
$row_DatosUsuarios = mysql_fetch_assoc($DatosUsuarios);
$totalRows_DatosUsuarios = mysql_num_rows($DatosUsuarios);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">

<html dir="LTR" lang="es"><!-- InstanceBegin template="/Templates/carrito_C.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>usuarios_lista</title>
<!-- InstanceEndEditable -->
<script type="text/javascript" src="../iepngfix_tilebg.js"></script>

<link rel="stylesheet" type="text/css" href="../stylesheet.css">

<style type="text/css">

.ie6_png 			{behavior: url("../iepngfix.htc") }

.ie6_png img		{behavior: url("../iepngfix.htc") }

.ie6_png input		{behavior: url("../iepngfix.htc") }

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

							<table border="0" cellspacing="0" cellpadding="0" class="header" width="100%">

								<tr>

									<td class="logo" width="100%"><a href="#">
                                    <div style="margin-right:170px;width:231px;">
                                    <img src="../images/33756-vl.png" border="0" alt="" width="231" height="98" ></div></a>
                                    </td>
                                    
							    </tr>
							</table>			

					</td></tr>

					<tr><td class="head3">

						<table cellpadding="0" cellspacing="0" border="0" class="head3_table">

							<tr>

								<td class="head3_td">

		<table cellpadding="0" cellspacing="0" border="0" class="menu">

			<tr>

				<td><a href="#"><img src="../images/m1.gif" border="0" alt="" width="58" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m2.gif" border="0" alt="" width="103" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m3.gif" border="0" alt="" width="44" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m4.gif" border="0" alt="" width="53" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m5.gif" border="0" alt="" width="76" height="8"></a></td>
			</tr>
		</table>								</td>

								<td style="padding:16px 0px 0px 0px;"><img src="../images/part2.gif" border="0" alt="" width="1" height="19"></td>

								<td style="padding:16px 9px 0px 20px;">

	<form name="search" action="#" method="get">	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:215px;" class="header">

		<tr>

			<td style="width:100%;"><input type=text name="keywords" class="go" value=""></td>

			<td style="padding:0px 0px 0px 12px;"><input type="image" src="../images/button_search_prod.gif" border="0" alt=""></td>
		</tr>

	</table></form>								</td>

								<td><img src="../images/m_right.gif" border="0" alt="" width="8" height="48"></td>
							</tr>
						</table>

					</td></tr>

					<tr><td class="banner"><a href="#" target="_blank"><img src="../images/banner_02.gif" border="0" alt="Banner2" title=" Banner2 " width="351" height="113"></a></td></tr>
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
    <td><img src="../images/infoBoxHeading_tl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_t"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="../images/infoBoxHeading_tr.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
  <tr> 
    <td  class="infoBoxHeading_l"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td  class="infoBoxHeading_td">Administrador</td> 
    <td  class="infoBoxHeading_r"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
  </tr> 
  <tr> 
    <td><img src="../images/infoBoxHeading_bl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_b"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="../images/infoBoxHeading_br.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
</table> 
<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBox2_table"> 
  <tr> 
    <td  class="infoBox2_td"><table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxContents2_table"> 
  <tr> 
  
   <?php include("../includes/cabeceraadmin.php");
?>
    
  </tr> 
</table></td> 
  </tr> 
</table>            </td>
          </tr>

<!-- categories_eof //-->

<!-- specials //-->

          <tr>

            <td>

 
<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBox_table"> 
  <tr> 
    <td  class="infoBox_td"><table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxContents_table"> 
  <tr> 
    <td align="center"  class="boxText">

                    				</td> 
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

                            	

                        

               



			













<div align="right" class="main"><form name="filter" action="../index1.php" method="get">
</form></div> 




				<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">

						<tr><td class="cont_heading_td">

							<table cellpadding="0" cellspacing="0" border="0" class="table2">

								<tr><td class="td2">

									<table cellpadding="0" cellspacing="0" border="0" class="table3">

										<tr><td class="td3">

											<table cellpadding="0" cellspacing="0" border="0" class="table4">

												<tr><td class="td4">&nbsp;</td>
											  </tr>
										</table>

									</td></tr>
								</table>

							</td></tr>
						</table>

					</td></tr>
				</table>	

								

<table cellpadding="0" cellspacing="0" border="0"><tr><td class="padd_3">



<div style="background:url(../images/line_.gif) 0px 0px repeat-x;"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

		



<div style="background:url(../images/line_x.gif) 0px 0px repeat-x;padding:0px 0px 1px 0px;"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

<table border="0" width="" cellspacing="0" cellpadding="0"> 
   <tr> 
     <td  class="tableBox_output_td main"><!-- InstanceBeginEditable name="contenido" -->
     
    <h1>Lista de Usuarios</h1>
    <p>&nbsp;<table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr class="tablaprincipal">
        <td width="147">id</td>
        <td width="182">Nombre</td>
        <td width="112">ACCIONES</td>
      </tr>
      <?php do { ?>
        <tr  class="brillo">
          <td><a href="usuarios_datos.php?recordID=<?php echo $row_DatosUsuarios['idUsuario']; ?>"> <?php echo $row_DatosUsuarios['idUsuario']; ?>&nbsp; </a></td>
          <td><?php echo $row_DatosUsuarios['strNombre']; ?>&nbsp; </td>
          <td>Editar - Eliminar</td>
        </tr>
        <?php } while ($row_DatosUsuarios = mysql_fetch_assoc($DatosUsuarios)); ?>
    </table>
    <br />
    <?php echo $totalRows_DatosUsuarios ?> Registros Total
    </p>
  
      <!-- InstanceEndEditable --><br> 
       <br></td>
   </tr> 	
</table> 


<div style="background:url(../images/line_x.gif) 0px 100% repeat-x;padding:1px 0px 0px 0px;"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

     


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

	<tr><td><img src="../images/spacer.gif" border="0" alt="" width="1" height="15"></td></tr>

	<tr><td class="footer_main">

				

<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer2_main"><tr><td>		

					<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer">

						<tr>
						  <td>&nbsp;</td>
						  <td class="footer2_td"><span><a href="#">Ofertas</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">B&uacute;squeda Avanzada</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Comentarios</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Crear Cuenta</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Entrar</a></span><br>Copyright &copy; 2011 <a href="#">Mobile store</a> &nbsp;&nbsp; <b><a href="#">Confidencialidad</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Condiciones de uso</a></b></td>
						</tr>
					</table>

		

</td></tr></table>		

	</td></tr>
</table>	





<!-- footer_eof //-->

</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($DatosUsuarios);
?>
