<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<h1>Car List</h1>
<c:forEach items="${carList}" var="car">
	<p>
		Name: ${car.brand.name}<br />
		Model: ${car.model}
	</p>
</c:forEach>