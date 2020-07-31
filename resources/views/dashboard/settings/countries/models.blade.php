<!--========= Main Module =========-->
@include('dashboard.settings.countries.modules.CountriesModule')
@include('dashboard.settings.countries.modules.EditCountryModule')

<!--========= States Modules =========-->
@include('dashboard.settings.countries.modules.StatesModule')
@include('dashboard.settings.countries.modules.CreateStateModule')
@include('dashboard.settings.countries.modules.EditStateModule')

<!--========= Cities Modules =========-->
@include('dashboard.settings.countries.modules.CitiesModule')
@include('dashboard.settings.countries.modules.CreateCityModule')
@include('dashboard.settings.countries.modules.EditCityModule')

<!--========= Neighborhoods Modules =========-->
@include('dashboard.settings.countries.modules.NeighborhoodsModule')
@include('dashboard.settings.countries.modules.CreateNeighborhoodModule')
@include('dashboard.settings.countries.modules.EditNeighborhoodModule')