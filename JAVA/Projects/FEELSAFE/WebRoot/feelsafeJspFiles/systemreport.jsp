<%@ page language="java" pageEncoding="ISO-8859-1"%>

<%@ taglib uri="http://jakarta.apache.org/struts/tags-bean" prefix="bean" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-html" prefix="html" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-logic" prefix="logic" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-tiles" prefix="tiles" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-template" prefix="template" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-nested" prefix="nested" %>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html:html locale="true">
  <head>
    <html:base />
    
    <title>employees.jsp</title>

	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

  </head>
  
  <body>
  <center>
    <table>
    <tr><td colspan="3"><b><font color="#FF0000"> SYSTEM REPORTS</font> </b></td></tr>
    <tr><td width="50"></td><td><a href="../feelSafe.do?do=appointmentreports" >Appointment Reports</a></td><td></td></tr>
    <tr><td width="50"></td><td><a href="../feelSafe.do?do=loginerrors" >Login Errors</a></td><td></td></tr>
    <tr><td width="50"></td><td><a href="../feelSafe.do?do=billgeneration" >Bill Generation</a></td><td></td></tr>
    </table>
    </center>
  </body>
</html:html>
