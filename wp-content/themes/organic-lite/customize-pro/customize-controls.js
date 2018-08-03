( function( api ) {

	// Extends our custom "organic-lite" section.
	api.sectionConstructor['organic-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );