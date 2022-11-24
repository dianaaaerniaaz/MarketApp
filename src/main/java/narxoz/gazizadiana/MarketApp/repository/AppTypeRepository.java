package narxoz.gazizadiana.MarketApp.repository;

import narxoz.gazizadiana.MarketApp.model.AppsTypes;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AppTypeRepository extends JpaRepository<AppsTypes, Long> {
}
