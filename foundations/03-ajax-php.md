# AJAX with PHP: Add Dynamic Content to Website

## What is `ajax`?
Ajax is a abbreviation of sorts and it comes from asynchronous JavaScript and XML. The A from asynchronous, the JA comes from JavaScript, the X from XML.

Ajax is what enable browser to sends and receives data in the background.

It is actually a combination of several techonologies working together, it is group of techonologies, not a single technology.

## Classic HTTP Model of how Ajax works

The user performs an action, they click on a link. An HTTP request is sent from the browser to the server, the server processes the request, and then the server returns HTML back to the browswer. 

One of the key parts here, is that the user must wait for those server response. It has to wait for the new page to be received and to load in the user's browser.

## Ajax Model

Webpage loads JavaScript ("Ajax engine").

User performs an action (e.g. clicking a link)

Request goes to JavaScript first, not server.

JavaScript may handle the request directly.

Validate data, update navigation, edit internal values.

JavaScript can communicate with the server in the background.

It sends XML asynchronously using XMLHttpRequest.

