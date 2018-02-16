var CmsDashboard = function()
{
	'use strict';

	var handleCmsDashboard = function()
	{
		var dashboard = jQuery( '#dashboard' );
		if ( dashboard.length === 0 )
		{
			console.debug( "--skip CmsDashboard" );
			return;
		}
		console.debug( 'init CmsDashboard' );

		$( '.dashboard-stat2' ).click( function()
		{
			console.debug( window.location.href );

			var langue = jQuery( this ).data( "langue" ),
				redirect = "";

			if ( window.location.pathname === "/" )
			{
				redirect = false;
			}
			else
			{
				redirect = true;
			}
			//Passer l'arguement redirect
			CmsTranslations.setCurrentTranslationIso3166( langue, redirect );

			// Si redirect = false => faire la redirection vers /dashboard/{LANG}
			if ( redirect === false )
			{
				window.location.href = '/dashboard/' + langue;
			}
		} );

		//faire "on", pour revenir au debut du dom car modal-dashboard n'existe pas encore au moment du chargement de la page.
		dashboard.on( 'click', '.modal-dashboard', function( event )
		{
			event.preventDefault();

			var idetab = jQuery( this ).data( "idetab" ),
				langue = CmsTranslations.getCurrentTranslationIso3166();

			$( '#myModal' ).find( '.modal-body' ).load( '/dashboard/ajax/modal/' + idetab + '/' + langue, function( result )
			{
				console.debug( result );
				$( '#myModal' ).modal( 'show' );
			} );
		} );

		$( '.modal-dashboard2' ).click( function()
		{
			var hebergement = jQuery( this ).data( "hebergement" ),
				langue2 = jQuery( this ).data( "langue2" );

			$( '#myModalHebergement' ).find( '.modal-body' ).load( '/dashboard/ajax/modal/hebergement/' + hebergement + '/' + langue2, function( result )
			{

				$( '#myModalHebergement' ).modal( 'show' );
			} );
		} );
	};
	return {
		init: handleCmsDashboard
	};
}();