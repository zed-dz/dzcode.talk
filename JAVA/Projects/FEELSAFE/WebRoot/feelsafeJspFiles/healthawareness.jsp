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
  <html:form action="/feelSafe.do?do=healthawareness1">
  <center>
  <b><font color="#FF0000"> HEALTH AWARENESS</font> </b><br><br>
    <table>
    <tr><td>Enter the Symptoms</td><td ><html:text property="symptoms"></html:text> </td></tr>
    <tr><td colspan="2" align="center"><html:submit>Search</html:submit></td></tr>
    <tr><td colspan="2" height="50"></td></tr>
    <tr><td>Disease Name</td><td><html:text property="diseasename" readonly="true"></html:text></td></tr>
    <tr><td>Medication</td><td><html:text property="medication" readonly="true"></html:text></td></tr>
    
    </table>
    </center>
    </html:form>
  </body>
</html:html>
