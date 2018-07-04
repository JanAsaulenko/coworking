	<div id="header-wrapper">
		<header id="header" class="container">

			<!-- Logo -->
				<div id="logo">
					<h1><a href="{{ url('/') }}">CoWorking</a></h1>
					<span>by ITA</span>
				</div>

			<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="{{ url('/') }}">Головна</a></li>
						<li>
							<a href="#">Ціни</a>
							<ul>
								<li><a href="#">Для невибагливих</a></li>
								<li><a href="#">Дешево</a></li>
								<li>
									<a href="#">Нормальні</a>
									<ul>
										<li><a href="#">Ціна-якість</a></li>
										<li><a href="#">Комфорт</a></li>
										<li><a href="#">Люкс</a></li>
										<li><a href="#">Преміум</a></li>
									</ul>
								</li>					
							</ul>
						</li>
						<li><a href="{{ url('/gallery') }}" class="current">Фото</a></li>
						<li><a href="#">Контакти</a></li>
						<li><a href="#order-form" id="order-btn">ЗАМОВИТИ</a></li>

					</ul>
				</nav>

		</header>
	</div>