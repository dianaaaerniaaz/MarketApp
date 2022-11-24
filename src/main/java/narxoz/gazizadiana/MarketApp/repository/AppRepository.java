package narxoz.gazizadiana.MarketApp.repository;

import narxoz.gazizadiana.MarketApp.model.Apps;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AppRepository extends JpaRepository<Apps, Long> {
}
