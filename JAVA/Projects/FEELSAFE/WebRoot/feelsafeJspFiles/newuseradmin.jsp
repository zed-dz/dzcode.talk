<%@ page language="java" pageEncoding="ISO-8859-1"%>
<%@ page language="java" import="feelsafeLogic.*" %>

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
    
    <title>newuser.jsp</title>

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
  
  <html:form action="/feelSafe.do?do=addemployee1">
      		<%
    			FeelSafeLogic feelSafeLogic=new FeelSafeLogic();
 			%>
  <center>
    <table cellpadding="0" cellspacing="0" width="740" height="543" bgcolor="white">
    <tr ><td > 
    <h3 align="center">New User Registration</h3><br>
    
	<bean:write property="errorMessage" name="feelSafeForm" filter="false"/>
    <table align="center">
    	<tr><td align="right">User Name</td><td><html:text property="userid"></html:text></td></tr>
    	<tr><td align="right">Password</td><td><html:text property="password"></html:text></td></tr>
    	<tr><td align="right">First Name</td><td><html:text property="firstname"></html:text></td></tr>
    	<tr><td align="right">Last Name</td><td><html:text property="lastname"></html:text></td></tr>
    	<tr><td align="right">Permanent Address</td><td><html:textarea property="permanentaddress" cols="16"></html:textarea></td></tr>
    	<tr><td align="right">Phone Number</td><td><html:text property="phonenumber"></html:text></td></tr>
    	<tr><td align="right">Sex</td><td>&nbsp;&nbsp;<html:radio property="sex" value="1">Male&nbsp;&nbsp;&nbsp;&nbsp;</html:radio><html:radio property="sex" value="2">Female</html:radio> </td></tr>
    	<tr><td align="right">Nationality</td><td><html:text property="nationality"></html:text></td></tr>
    	
    	<tr><td align="right">Qualification</td><td><html:text property="qualification"></html:text></td></tr>
    	<tr><td align="right">Work Type</td><td><html:text property="specialist"></html:text></td></tr>
    	<tr><td align="right">Working Hours</td><td><html:text property="consultinghours"></html:text></td></tr>
    	
    	<tr><td align="right">Type</td><td><html:select property="type"><html:option value="1">Admin</html:option><html:option value="3">Doctor</html:option><html:option value="2">Employee&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</html:option> </html:select> </td></tr>
    	<tr><td align="right">Type the text given below</td><td><html:text property="textverification"></html:text></td></tr>
    	<tr><td></td><td><b><font color="green"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <%=feelSafeLogic.id1()%>  </font></b>    </td></tr>
    	<tr><td height="20"></td><td></td></tr>
    	
    	<tr align="center"><td colspan="2"><html:submit></html:submit><html:reset></html:reset> <html:button property="cancel1" onclick="history.go(-1);">Cancel</html:button> </td></tr>
    	
    </table>
    
    
    </td></tr>
    <tr heigth="20" valign="top"><td > </td></tr>
    </table>
    </center>
  
    </html:form>
  </body>
</html:html>
