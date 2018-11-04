# directoryService

CLASSIC DIRECTORY SERVICE.

A Task given to me by Motus Technologies as an Interview for a Lead Software Developement Position.
Ensure to place all files in a folder called "workMotus",
and "searchlistings" in a folder called "MTLsearchAPI" located in "/workMotus".

FUNCTIONALITIES:
* Admin can log in and create a listing for a business.(for Access use "MTL456" )
* Admin can create as many categories as he desires.
* A business can belong to multiple categories.
* The general public can search and view listings. Search goes through name and description.
* A listing contains the name of the business, a description, website URL, contact email, phones and address.
* Listing can have more than one images. 
* Admin can delete or modify a business listing.
* Admin can how many views a business listing has had. 
* Exposed search functionality via an API.

--SEARCH API>
    This Listings' search API is AVAILABLE at:

    'https://www.jubeeapps.000webhostapp.com/workMotus/MTLsearchAPI/searchlistings.php?key="YourKey"&search="SearchCriterea"';
    Where "YourKey" is the six digit authorization key issued to registered users by the company hosting the business listing API(MTL), 
    use "MTL345".
    And "SearchCriterea" is the search criterea for the business the user is looking for.

    This search API RETURNS:

    Encoded Json Array as;
    Output=}Array(5)[Array("x"),Array("x"),Array("x"),Array("x"),Array("x"),Array("x")],
    where "x" is the number of search results in similar order.

    Note:Array references are;
    Output=}Array(5)[search_result_names,search_result_categories,search_result_description,search_result_address,
    search_result_number,search_result_url].

    This search API ERRORS REPORT:

    MTL Regiseration Key Error as;
    Output=}Array(1)["Key Error" , "nil"].

    And empty search Criterea as;
    Output=}Array(1)["Error, Empty search" , "nil"].
-->
